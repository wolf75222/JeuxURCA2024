<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Team;
use App\Models\Event;
use App\Models\User;
use Auth;
use Spatie\Permission\Models\Role;
use App\Models\Degree;

class TeamController extends Controller
{

    public function index()
    {
        $users = User::paginate(10);
        $roles = Role::all();
        $teams = Team::paginate(10);
        $events = Event::all();

        return view('dashboard.dashboard-teams', compact(['teams', 'events']), ['users' => $users, 'roles' => $roles]);
    }

    public function monequipe()
    {
        $user = Auth::user(); // Récupérer l'utilisateur connecté
        $team = $user->team; // Récupérer l'équipe de l'utilisateur

        // Si l'utilisateur est dans une équipe, vérifiez s'il est le leader de l'équipe
        $isTeamLeader = $team ? $user->hasRole('team_leader') : false;

        // Récupérer toutes les équipes pour le formulaire de rejoindre une équipe
        $teams = Team::all();

        // Retourner la vue avec les données de l'équipe et les équipes disponibles
        return view('teams.show', compact('team', 'isTeamLeader', 'teams'));
    }

    public function equipes()
    {
        $user = Auth::user(); // Récupérer l'utilisateur connecté
        $team = $user->team; // Récupérer l'équipe de l'utilisateur

        // Si l'utilisateur est dans une équipe, vérifiez s'il est le leader de l'équipe
        $isTeamLeader = $team ? $user->hasRole('team_leader') : false;

        // Récupérer toutes les équipes avec pagination
        // La valeur '10' détermine le nombre d'équipes par page, vous pouvez ajuster cette valeur selon vos besoins
        $teams = Team::paginate(10);

        // Retourner la vue avec les données de l'équipe et les équipes disponibles
        return view('pages.equipes', compact('team', 'isTeamLeader', 'teams'));
    }


    public function leaveTeam(Request $request, Team $team): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user(); // Assuming you are using Laravel's built-in authentication

        // Vérifier si l'utilisateur est le leader de l'équipe
        if ($user->hasRole('team leader') && $user->team_id == $team->id && $team->members_count > 1) {
            // Retirer le rôle de 'team_leader'
            $user->removeRole('team leader');

            // Transférer le rôle de 'team_leader' à un autre membre de l'équipe
            $team->users()->where('id', '!=', $user->id)->first()->assignRole('team leader');
        }

        // Diminuer le compteur de membres de l'équipe
        $team->decrement('members_count');
        // Dissocier l'utilisateur de l'équipe
        $user->team()->dissociate();
        // Enregistrer les modifications
        $user->save();

        return redirect()->route('teams.show');
    }

    public function joinTeam(Request $request)
    {
        $user = Auth::user(); // Assuming you are using Laravel's built-in authentication

        // Récupérer l'identifiant de l'équipe à partir de la requête
        $teamId = $request->input('team');
        $team = Team::find($teamId);

        // Vérifiez si l'équipe existe
        if (!$team) {
            return redirect()->route('teams.show')->with('error', 'Team not found.');
        }

        // Vérifier si l'équipe a atteint sa limite maximale de membres
        if ($team->members_count >= 6) {
            return redirect()->route('teams.show')->with('error', 'The team is full.');
        }

        // Vérifier si le mot de passe fourni correspond au mot de passe de l'équipe
        $password = $request->input('password'); // Assurez-vous que le nom du champ est correct

        if (!is_null($team->password)) {
            if (!Hash::check($password, $team->password)) {
                return redirect()->route('teams.show')->with('error', 'Incorrect team password.');
            }
        }

        // Vérifier si l'utilisateur n'est pas déjà membre d'une autre équipe
        if ($user->team_id) {
            $currentTeam = Team::find($user->team_id);
            if ($currentTeam) {
                $currentTeam->decrement('members_count');
                $user->team()->dissociate();
                $user->save();
            }
        }

        // Ajouter le rôle de 'team_leader' si  $team->members_count < 1 
        if ($team->members_count < 1) {
            $user->assignRole('team leader');
        }

        // Rejoindre l'équipe
        $user->team()->associate($team);
        $user->save();

        // Mettre à jour le nombre de membres de l'équipe 

        $team->increment('members_count');

        return redirect()->route('teams.show')->with('success', 'You have successfully joined the team.');
    }


    public function store(Request $request)
    {
        \Log::info($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'degree_id' => 'required|exists:degrees,id', // Assurez-vous que degree_id existe dans la table degrees
            'color' => 'required|string',
            'password' => 'nullable|string|min:6',
        ]);

        $password = $request->input('password') ? Hash::make($request->input('password')) : null;

        $team = Team::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'degree_id' => $request->input('degree_id'), // Utiliser degree_id au lieu de degree
            'color' => $request->input('color'),
            'password' => $password,
            'points' => 0,
            'medailles' => 0,
        ]);


        $user = Auth::user(); // Assuming you are using Laravel's built-in authentication
        $user->team()->associate($team);
        $user->save();

        // Obtenir l'utilisateur actuel
        $user = Auth::user();

        // ajouter le role team leader si l'utilisateur n'a pas ce role 
        if (!$user->hasRole('team leader')) {
            $user->assignRole('team leader');
        }

        if ($user->isAdmin() || $user->isOrganizer()) {
            return redirect()->route('dashboard.dashboard-teams')->with('success', 'Team created successfully.');
        } else {
            return redirect()->route('teams.show')->with('success', 'Team created successfully.');
        }

    }


    public function update(Request $request, $id)
    {
        // Trouver l'équipe par son ID
        $team = Team::findOrFail($id);

        // Valider les données de la requête
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'degree_id' => 'required|exists:degrees,id',
            'password' => 'nullable|string|min:6|confirmed',
            'color' => 'nullable|string',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Mettre à jour les détails de l'équipe
        $team->name = $validatedData['name'];
        $team->description = $validatedData['description'] ?? $team->description; // Utiliser l'opérateur null coalescent
        $team->degree_id = $validatedData['degree_id']; // Utiliser 'degree_id'

        // Mettre à jour le mot de passe si fourni
        if (!empty($validatedData['password'])) {
            $team->password = Hash::make($validatedData['password']);
        }

        // Mettre à jour la couleur si fournie
        if (!empty($validatedData['color'])) {
            $team->color = $validatedData['color'];
        }

        // Gérer le téléchargement de l'image de logo
        if ($request->hasFile('logo')) {
            // Supprimer l'ancienne image si elle existe
            if ($team->logo && Storage::disk('public')->exists($team->logo)) {
                Storage::disk('public')->delete($team->logo);
            }

            // Stocker la nouvelle image
            $imagePath = $request->file('logo')->store('team-logos', 'public');
            $team->logo = $imagePath;
        }

        // Sauvegarder les modifications
        $team->save();

        // Rediriger avec un message de succès
        return redirect()->route('dashboard.dashboard-teams')->with('success', 'Team updated successfully.');
    }

    public function resetTeamImage(Request $request)
    {
        $teamIds = $request->input('selected_teams', []);

        foreach ($teamIds as $teamId) {
            $team = Team::find($teamId);
            if ($team) {
                // Supprimer l'ancienne image si elle existe
                if ($team->image_path && Storage::disk('public')->exists($team->image_path)) {
                    Storage::disk('public')->delete($team->image_path);
                }

                $team->image_path = null; // Réinitialiser le chemin de l'image de l'équipe
                $team->save();
            }
        }

        return back()->with('success', 'La photo de l\'équipe a été réinitialisée.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->get('search');
        $teams = Team::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('description', 'like', '%' . $searchTerm . '%') // Recherche également dans la description si vous le souhaitez
            ->paginate(10); // Paginer les résultats

        $users = User::paginate(10);
        $roles = Role::all();
        //$teams = Team::with('users')->get();
        $events = Event::all();


        return view('dashboard.dashboard-teams', compact(['teams', 'events']), ['users' => $users, 'roles' => $roles]);
    }


    // TeamController.php

    public function registerEvent(Team $team, Event $event)
    {
        $team->events()->attach($event, ['preferred_order' => 1]); // Assuming default preferred order is 1
        return redirect()->back();
    }

    public function unregisterEvent(Team $team, Event $event)
    {
        $team->events()->detach($event);
        return redirect()->back();
    }

    public function incrementOrder(Team $team, Event $event)
    {
        $team->events()->updateExistingPivot($event, ['preferred_order' => DB::raw('preferred_order + 1')]);
        return redirect()->back();
    }

    public function decrementOrder(Team $team, Event $event)
    {
        $team->events()->updateExistingPivot($event, ['preferred_order' => DB::raw('preferred_order - 1')]);
        return redirect()->back();
    }

    public function create()
    {
        $users = User::paginate(10);
        $roles = Role::all();
        $teams = Team::with('users')->get();
        $events = Event::all();
        $degrees = Degree::all();


        return view('teams.create', compact(['teams', 'events']), ['users' => $users, 'roles' => $roles], ['degrees' => $degrees]);
    }


    public function createnew()
    {
        $users = User::paginate(10);
        $roles = Role::all();
        $teams = Team::with('users')->get();
        $events = Event::all();
        $degrees = Degree::all();


        return view('teams.createnew', compact(['teams', 'events']), ['users' => $users, 'roles' => $roles], ['degrees' => $degrees]);
    }


    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('dashboard.dashboard-teams')->with('success', 'Team deleted successfully!');
    }

    public function destroySelected(Request $request)
    {
        \Log::info($request->all()); // Continuez à déboguer si nécessaire

        $teamIds = $request->input('selected_teams', []);
        $teamIds = array_filter($teamIds, 'is_numeric');
        $teamIds = array_map('intval', $teamIds);

        // Dissocier les utilisateurs des équipes à supprimer
        User::whereIn('team_id', $teamIds)->update(['team_id' => null]);

        // Supprimer les équipes sélectionnées
        Team::whereIn('id', $teamIds)->delete();

        return back()->with('success', 'Les équipes sélectionnées ont été supprimées avec succès.');
    }

    public function edit(Team $team)
    {
        $users = User::paginate(10);
        $roles = Role::all();
        $teams = Team::with('users')->get();
        $events = Event::all();

        return view('teams.edit', compact('team'));
    }


    public function classement()
    {
        // Get teams sorted by 'medailles' in descending order
        $teams_medaille = Team::orderBy('medailles', 'desc')->paginate(10);

        // Get teams sorted by 'points' in descending order
        $teams_point = Team::orderBy('points', 'desc')->paginate(10);

        // Return the view with both sets of teams
        return view('pages.classement', compact('teams_medaille', 'teams_point'));
    }

}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Team;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $roles = Role::all(); // Récupère tous les rôles
        $teams = Team::all(); // Récupère toutes les équipes

        return view('dashboard.dashboard-users', compact('users', 'roles', 'teams'));
    }
    public function edit(User $user)
    {
        $roles = Role::all(); // Récupère tous les rôles
        return view('users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8', // Mot de passe facultatif et doit avoir au moins 8 caractères
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name', // Chaque élément du tableau doit exister dans la table des rôles
            'team' => 'nullable|exists:teams,id',
        ]);

        // Mise à jour des informations de l'utilisateur
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if (!empty($validatedData['team'])) {
            $user->team_id = $validatedData['team'];
        }

        // Mise à jour du mot de passe si fourni
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        if ($request->has('roles') && is_array($request->input('roles'))) {
            $user->syncRoles($request->input('roles'));
        }

        return redirect()->route('dashboard.dashboard-users')->with('success', 'User mis à jour avec succès.');
    }



    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }



    public function showTeam()
    {
        $user = auth()->user();
        $allTeams = Team::all(); // Récupère toutes les équipes

        return view('teams.show', compact('user', 'allTeams'));
    }



    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard-users')->with('success', ' User supprimés avec succès.');
    }

    public function destroySelected(Request $request)
    {
        \Log::info($request->all()); // Continuez à déboguer si nécessaire
        $userIds = $request->input('selected_users', []);
        \Log::info($userIds); // Continuez à déboguer si nécessaire

        // Filtrer et mapper les identifiants
        $userIds = array_filter($userIds, 'is_numeric');
        $userIds = array_map('intval', $userIds);

        // Supprimer les utilisateurs sélectionnés
        User::whereIn('id', $userIds)->delete();

        return back()->with('success', 'Les utilisateurs sélectionnés ont été supprimés avec succès.');
    }



    public function search(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('name', 'like', '%' . $search . '%')->paginate(10);
        $roles = Role::all(); // Récupère tous les rôles
        $teams = Team::all(); // Récupère toutes les équipes
        return view('dashboard.dashboard-users', compact('users', 'roles' , 'teams'));
    }

    public function resetProfilePhoto(Request $request)
    {
        $userIds = $request->input('selected_users', []);

        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user) {
                $user->profile_photo_path = null; // Réinitialiser la photo de profil
                $user->save();
            } else {
                // Logique en cas d'utilisateur non trouvé
            }
        }

        return back()->with('success', 'La photo de profil a été réinitialisée.');
    }

    //create user 
    public function create()
    {
        $roles = Role::all(); // Récupère tous les rôles
        $teams = Team::all(); // Récupère toutes les équipes

        return view('users.create', compact('roles', 'teams'));
    }




    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
            'team' => 'nullable|exists:teams,id'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        if (!empty($validatedData['team'])) {
            $user->team_id = $validatedData['team'];
            $user->save();
        }

        foreach ($validatedData['roles'] as $roleName) {
            $user->assignRole($roleName);
        }

        return redirect()->route('dashboard.dashboard-users');
    }


}

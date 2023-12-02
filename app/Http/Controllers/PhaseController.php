<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Phase;
use App\Models\Group;
use App\Models\GroupTeams;
use App\Models\Team;
use App\Models\Matche;
use App\Models\TeamsRegisterEvents;
use Illuminate\Http\Request;

class PhaseController extends Controller
{

    public function index(Request $request)
    {
        //$eventId = $request->input('event_id'); // Get the event_id from the URL query parameters

        //$phases = Phase::where('event_id', $eventId)->get(); // Adjust the query to filter phases by event_id


        // Assuming you also need to retrieve the specific event
        //$events = Event::find($eventId);

        $phases = Phase::paginate(10); // Paginate the results
        $events = Event::all();

        return view('dashboard.dashboard-phases', compact('events', 'phases'));
    }


    public function search(Request $request)
    {
        $searchTerm = $request->get('search');
        $phases = Phase::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('event', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->paginate(10); // Paginer les résultats

        $events = Event::all();

        return view('dashboard.dashboard-phases', compact('phases', 'events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'event_id' => 'required|exists:events,id',
        ]);

        $phase = Phase::create([
            'name' => $request->input('name'),
            'event_id' => $request->input('event_id'),
        ]);
        $phase->save();

        return redirect()->route('dashboard.dashboard-phases')->with('success', 'Phase créée avec succès.');
    }
    

    public function delete(Request $request, $phase_id)
    {
        // Find the phase by ID
        $phase = Phase::findOrFail($phase_id);

        // Delete associated matches
        $phase->matches()->delete();

        // Delete associated groups and their team relationships
        $phase->groups()->each(function ($group) {
            $group->teams()->delete();  
            $group->delete();
        });

        // Finally, delete the phase
        $phase->delete();

        // Optionally, you can redirect back or return a response
        return redirect()->back()->with('success', 'Phase and associated data deleted successfully');
    }

    public function destroySelectedPhases(Request $request)
    {
        $phaseIds = $request->input('selected_phases', []);

        // Filtrer et mapper les identifiants
        $phaseIds = array_filter($phaseIds, 'is_numeric');
        $phaseIds = array_map('intval', $phaseIds);

        // Supprimer les phases sélectionnées
        Phase::whereIn('id', $phaseIds)->each(function ($phase) {

            // Supprimer les matchs associés
            $phase->matches()->delete();

            // Supprimer les groupes associés et leurs relations avec les équipes
            $phase->groups()->each(function ($group) {
                $group->teams()->delete();
                $group->delete();
            });

            // Enfin, supprimer la phase
            $phase->delete();

        });

        return back()->with('success', 'Les phases sélectionnées ont été supprimées avec succès.');

    }


    

    public function delete_group(Request $request, $group_id)
    {
        $group = Group::findOrFail($group_id);

        $group->teams()->delete();
        $group->delete();

        return redirect()->back()->with('success', 'Phase and associated data deleted successfully');
    }

    public function create_group(Request $request, $phase_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add any other validation rules as needed
        ]);

        $phase = Phase::findOrFail($phase_id);

        // Create a new group for the phase
        $group = new Group([
            'name' => $request->input('name'),
            // Add any other fields as needed
        ]);

        // Save the group and associate it with the phase
        $phase->groups()->save($group);

        // You can redirect to a specific route or return a response as needed
        return redirect()->back()->with('success', 'Phase and associated data deleted successfully');
    }


    public function create_match(Request $request, $phase_id)
    {
        $request->validate([
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id',
            'type' => 'required|string|max:255',
            // Add any other validation rules as needed
        ]);

        // Find the phase by ID
        $phase = Phase::findOrFail($phase_id);

        // Create a new match for the phase
        $match = new Matche([
            'team1_id' => $request->input('team1_id'),
            'team2_id' => $request->input('team2_id'),
            'type' => $request->input('type'),
            // Add any other fields as needed
        ]);

        // Save the match and associate it with the phase
        $phase->matches()->save($match);

        // You can redirect to a specific route or return a response as needed
        return redirect()->back()->with('success', 'Phase and associated data deleted successfully');
    }

    public function delete_match(Request $request, $match_id)
    {
        // Find the match by ID
        $match = Matche::findOrFail($match_id);

        // Delete the match
        $match->delete();

        return redirect()->back()->with('success', 'Match deleted successfully');
    }

    public function create_event(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $event = Event::create(['name' => $request->input('name')]);
        $event->save();

        return redirect()->back()->with('success', 'Event created successfully.');
    }


    public function create_phase(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'event_id' => 'required|exists:events,id',
        ]);

        $phase = Phase::create([
            'name' => $request->input('name'),
            'event_id' => $request->input('event_id'),
        ]);
        $phase->save();

        return redirect()->back()->with('success', 'Phase created successfully.');
    }

    public function create_phasenew(Request $request)
    {
        $events = Event::all();


        return view('phases.create', compact('events'));
    }

    public function delete_event(Request $request, $event_id)
    {
        $event = Event::findOrFail($event_id);

        $event->phases()->each(function ($phase) {

            // Delete associated matches
            $phase->matches()->delete();

            // Delete associated groups and their team relationships
            $phase->groups()->each(function ($group) {
                $group->teams()->delete();
                $group->delete();
            });

            // Finally, delete the phase
            $phase->delete();

        });

        $event->delete();

        return redirect()->back()->with('success', 'Match deleted successfully');
    }


    public function destroySelected(Request $request)
    {
        $eventIds = $request->input('selected_events', []);

        // Filtrer et mapper les identifiants
        $eventIds = array_filter($eventIds, 'is_numeric');
        $eventIds = array_map('intval', $eventIds);

        // Supprimer les événements sélectionnés
        Event::whereIn('id', $eventIds)->each(function ($event) {
            $event->phases()->each(function ($phase) {

                // Supprimer les matchs associés
                $phase->matches()->delete();

                // Supprimer les groupes associés et leurs relations avec les équipes
                $phase->groups()->each(function ($group) {
                    $group->teams()->delete();
                    $group->delete();
                });

                // Enfin, supprimer la phase
                $phase->delete();

            });

            $event->delete();
        });

        return back()->with('success', 'Les événements sélectionnés ont été supprimés avec succès.');

    }

    // update 
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $phase = Phase::findOrFail($id);
        $phase->update(['name' => $request->input('name')]);

        return redirect()->back()->with('success', 'Phase updated successfully.');
    }

    
    public function index_groups(Request $request)
    {
        $groups = Group::paginate(10); // Paginate the results
        $events = Event::all();
        $phases = Phase::all();

        return view('dashboard.dashboard-groups', compact('events', 'phases', 'groups'));
    }

    public function search_groups(Request $request)
    {
        $searchTerm = $request->get('search');
        $groups = Group::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('phase', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->orWhereHas('phase.event', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->paginate(10); // Paginer les résultats

        $events = Event::all();
        $phases = Phase::all();

        return view('dashboard.dashboard-groups', compact('groups', 'events', 'phases'));
    }

    // update
    public function update_groups(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $group = Group::findOrFail($id);
        $group->update(['name' => $request->input('name')]);

        return redirect()->back()->with('success', 'Group updated successfully.');
    }

    public function create_groupnew(Request $request)
    {
    
        $phases = Phase::all();

        return view('groups.create', compact('phases'));
    }

    // destroySelected 
    public function destroySelectedGroups(Request $request)
    {
        $groupIds = $request->input('selected_groups', []);
        \Log::info($groupIds);

        // Filtrer et mapper les identifiants
        $groupIds = array_filter($groupIds, 'is_numeric');
        $groupIds = array_map('intval', $groupIds);

        // Supprimer les groupes sélectionnés
        Group::whereIn('id', $groupIds)->each(function ($group) {
            $group->teams()->delete();
            $group->delete();
        });

        return back()->with('success', 'Les groupes sélectionnés ont été supprimés avec succès.');

    }

    //store groups  name phase 
    public function store_groups(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phase_id' => 'required|exists:phases,id', // Ensure phase_id exists in phases table
        ]);
    
        $group = new Group([
            'name' => $request->input('name'),
            'phase_id' => $request->input('phase_id'),
        ]);
    
        $group->save();
    
        return redirect()->route('dashboard.dashboard-groups')->with('success', 'Group created successfully.');
    }

    // index matches
    public function index_matches(Request $request)
    {
        $matches = Matche::paginate(10); // Paginate the results
        $events = Event::all();
        $phases = Phase::all();
        $groups = Group::all();
        $teams = Team::all();

        return view('dashboard.dashboard-matches', compact('events', 'phases', 'groups', 'matches', 'teams'));
    }

    // search_matches
    public function search_matches(Request $request)
    {
        $searchTerm = $request->get('search');
        $matches = Matche::where('type', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('phase', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->orWhereHas('phase.event', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->paginate(10); // Paginer les résultats

        $events = Event::all();
        $phases = Phase::all();
        $groups = Group::all();
        $teams = Team::all();

        return view('dashboard.dashboard-matches', compact('matches', 'events', 'phases', 'groups' , 'teams'));
    }
    
    // update_matches team1 tema2 type winner_id
    public function update_matches(Request $request, $id)
    {
        $request->validate([
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id',
            'type' => 'required|string|max:255',
            'winner_id' => 'nullable|exists:teams,id',
        ]);

        $match = Matche::findOrFail($id);
        $match->update([
            'team1_id' => $request->input('team1_id'),
            'team2_id' => $request->input('team2_id'),
            'type' => $request->input('type'),
            'winner_id' => $request->input('winner_id'),
        ]);

        return redirect()->back()->with('success', 'Match updated successfully.');
    }

    // create_matchenew
    public function create_matchenew(Request $request)
    {
        $events = Event::all();
        $phases = Phase::all();
        $groups = Group::all();
        $teams = Team::all();

        return view('matches.create', compact('events', 'phases', 'groups' , 'teams'));
    }

    // store_matches
    public function store_matches(Request $request)
    {
        $request->validate([
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id',
            'type' => 'required|string|max:255',
            'winner_id' => 'nullable|exists:teams,id',
            'phase_id' => 'required|exists:phases,id',
        ]);

        $match = new Matche([
            'team1_id' => $request->input('team1_id'),
            'team2_id' => $request->input('team2_id'),
            'type' => $request->input('type'),
            'winner_id' => $request->input('winner_id'),
            'phase_id' => $request->input('phase_id'),
        ]);

        $match->save();

        return redirect()->route('dashboard.dashboard-matches')->with('success', 'Match created successfully.');
    }

    // destroySelectedMatches
    public function destroySelectedMatches(Request $request)
    {
        $matchIds = $request->input('selected_matches', []);

        // Filtrer et mapper les identifiants
        $matchIds = array_filter($matchIds, 'is_numeric');
        $matchIds = array_map('intval', $matchIds);

        // Supprimer les matchs sélectionnés
        Matche::whereIn('id', $matchIds)->delete();

        return back()->with('success', 'Les matchs sélectionnés ont été supprimés avec succès.');

    }




}




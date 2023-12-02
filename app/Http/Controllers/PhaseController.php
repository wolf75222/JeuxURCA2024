<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Phase;
use App\Models\Group;
use App\Models\GroupTeams;
use App\Models\Matche;
use App\Models\TeamsRegisterEvents;
use Illuminate\Http\Request;

class PhaseController extends Controller
{

    public function index(Request $request)
    {
        $eventId = $request->input('event_id'); // Get the event_id from the URL query parameters
    
        $phases = Phase::where('event_id', $eventId)->get(); // Adjust the query to filter phases by event_id

    
        // Assuming you also need to retrieve the specific event
        $event = Event::find($eventId);
    
        return view('dashboard.dashboard-phase', compact('event', 'phases'));
    }





    public function store(Request $request, $event_id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $phase = Phase::create(['name' => $request->input('name'), 'event_id' => $event_id]);
        $phase->save();

        return redirect()->back()->with('success', 'Phase created successfully.');
    }

    public function delete(Request $request, $phase_id) {
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

    public function add_team_to_group(Request $request, $group_id) {
        // Validate the request
        $request->validate([
            'team_id' => 'required|exists:teams,id',
        ]);

        // Assuming you have a relationship in your Group model named 'teams'
        $group = Group::findOrFail($group_id);

        // Add the team to the group
        $group_teams = GroupTeams::create([
            'team_id' => $request->input('team_id'),
            'group_id' => $group_id,
        ]);
        $group_teams->save();

        // You can add a success message if needed
        return redirect()->back()->with('success', 'Team added to group successfully');
    }

    public function remove_team_to_group(Request $request, $group_id, $team_id) {
        $group = Group::find($group_id);

        $groupTeam = GroupTeams::where('group_id', $group_id)->where('team_id', $team_id)->first();
        // Remove the team from the group
        $groupTeam->delete();

        // You can add a success message if needed
        return redirect()->back()->with('success', 'Team added to group successfully');
    }

    public function update_groups_points(Request $request)
    {
        // Validate the request if needed

        $data = $request->json()->all();

        // Iterate through the data and update the points
        foreach ($data as $teamId => $groupPoints) {
            foreach ($groupPoints as $groupId => $points) {
                // Find and update your model
                GroupTeams::where(['team_id' => $teamId, 'group_id' => $groupId])->update(['points' => $points]);
            }
        }

        // You can add a success message if needed
        return response()->json(['success' => true]);
    }

    public function update_matches_results(Request $request)
    {
        // Validate the request if needed

        $data = $request->json()->all();

        foreach ($data as $match_id => $winner_id) {
            $match = Matche::findOrFail($match_id);

            if ($winner_id === 'null') {
                $winner_id = null;
            }

            // Update the winner_id
            $match->update(['winner_id' => $winner_id]);
        }

        return response()->json(['success' => true]);
    }

    public function update_score_phase(Request $request) {
        $data = $request->input('ids');

        foreach ($data as $registrationId => $points) {
            // Update the points in the database for each registration
            $registration = TeamsRegisterEvents::findOrFail($registrationId); // Replace with your actual model
            $registration->update(['points' => $points]);
        }

        return redirect()->back()->with('success', 'Points updated successfully');

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

    public function destroySelected(Request $request)
    {
        \Log::info($request->all()); // Continuez à déboguer si nécessaire
        $phaseId = $request->input('selected_phases', []);
        \Log::info($phaseId); // Continuez à déboguer si nécessaire

        // Filtrer et mapper les identifiants
        $phaseId = array_filter($phaseId, 'is_numeric');
        $phaseId = array_map('intval', $phaseId);

        // Supprimer les évènement sélectionnés
        Phase::whereIn('id', $phaseId)->delete();

        return back()->with('success', 'Les phases sélectionnés ont été supprimés avec succès.');
    }


    public function create_event(Request $request) {
        $request->validate([
            'name' => 'required|string',
        ]);

        $event = Event::create(['name' => $request->input('name')]);
        $event->save();

        return redirect()->back()->with('success', 'Event created successfully.');
    }


    public function create_phase(Request $request) {
        $request->validate([
            'name' => 'required|string',
        ]);

        $phase = Phase::create(['name' => $request->input('name')]);
        $phase->save();

        return redirect()->back()->with('success', 'Phase created successfully.');
    }

    public function delete_event(Request $request, $event_id) {
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Team;
use App\Models\Event;
use Auth;

class TeamController extends Controller
{
    public function monequipe()
    {
        $teams = Team::with('users')->get();
        $events = Event::all();

        return view('monequipe', compact(['teams', 'events']));
    }

    public function update_score(Request $request) {
        $teamsData = $request->input('teams');

        // Iterate through the teams and save/update the data
        foreach ($teamsData as $teamId => $data) {
            // Assuming you have an Eloquent model for teams
            $team = Team::find($teamId);

            if ($team) {
                // Update the team data

                $team->medailles = $data['medailles'];
                $team->points = $data['points'];
                $team->save();
            }
        }

        return redirect()->route('resultats');
    }

    public function leaveTeam(Request $request, Team $team): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user(); // Assuming you are using Laravel's built-in authentication

        $team->decrement('members_count');
        $user->team()->dissociate();
        $user->save();

        return redirect()->route('monequipe');
    }

        public function joinTeam(Request $request, Team $team)
    {
        $user = Auth::user(); // Assuming you are using Laravel's built-in authentication

        // Check if the team has reached its maximum members limit (assuming 6 in your example)
        if ($team->members_count >= 6) {
            return redirect()->route('monequipe')->with('error', 'The team is full.');
        }

        // Check if the provided password matches the team's password
        $password = $request->input('passwoord'); // Assuming you have a form field named 'password'

        if (!is_null($team->password)) {
            if (!Hash::check($password, $team->password)) {
                return redirect()->route('monequipe')->with('error', 'Incorrect team password.');
            }
        }

        // Check if the user is not already a member of another team
        if ($user->team_id) {
            // If the user is already a member of another team, remove them from the current team
            $currentTeam = Team::find($user->team_id);
            if ($currentTeam) {
                $currentTeam->decrement('members_count');
                $user->team()->dissociate();
                $user->save();
            }
        }

        // Join the team
        $user->team()->associate($team);
        $user->save();

        // Update the team members count
        $team->increment('members_count');

        return redirect()->route('monequipe')->with('success', 'You have successfully joined the team.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required|string',
            'composante' => 'required|string',
            'team_password' => 'nullable|string|min:6|confirmed', // New password and confirmation

        ]);

        // Hash the password if it is provided
        $password = $request->input('password') ? Hash::make($request->input('password')) : null;

        // Create the team
        $team = Team::create([
            'name' => $request->input('team_name'),
            'degree' => $request->input('composante'),
            'password' => $password,
            'members_count' => 1, // Initialize to 0 members
        ]);

        $team->save();

        $user = Auth::user(); // Assuming you are using Laravel's built-in authentication
        $user->team()->associate($team);
        $user->save();

        return redirect()->route('monequipe')->with('success', 'Team created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Find the team by ID
        $team = Team::findOrFail($id);


        // Validate the request data
        $request->validate([
            'team_name' => 'string|max:255',
            'team_description' => 'nullable|string|max:255',
            'team_composante' => 'in:SEN,ODONTO,MEDECINE',
            'team_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules
            'team_password' => 'nullable|string|min:6|confirmed', // New password and confirmation

            // Add validation rules for other fields as needed
        ]);

        // Update the team details based on the form data
        $team->name = $request->input('team_name');
        $team->description = $request->input('team_description');
        $team->degree = $request->input('team_composante');

        $newPassword = $request->input('team_password');
        if ($newPassword) {
            $team->password = Hash::make($newPassword);
        }

        // Check if an image file is provided
        if ($request->hasFile('team_image')) {
            // Store the uploaded image using the Storage facade
            $path = $request->file('team_image')->store('team_images', 'public');

            // Delete the old image if it exists
            if ($team->image_path) {
                Storage::disk('public')->delete($team->image_path);
            }

            // Update the team's image path in the database
            $team->image_path = $path;
        }

        $team->save();

        return redirect()->route('monequipe')->with('success', 'Team updated successfully!');
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Team;
use App\Models\Phase;
use App\Models\Matche;

class SaisieController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $teams = Team::all();
        $phases = Phase::all();
        $matches = Matche::with('phase')->get();

        return view('dashboard.dashboard-saisie', compact('events', 'teams', 'phases', 'matches'));
    }

    public function storePoints(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'phase_id' => 'required|exists:phases,id',
            'match_id' => 'required|exists:matches,id',
            'score_team1' => 'required|numeric',
            'score_team2' => 'required|numeric',
        ]);

        $match = Matche::findOrFail($request->match_id);
        $match->score_team1 = $request->score_team1;
        $match->score_team2 = $request->score_team2;

        // Déterminer l'équipe gagnante
        if ($match->score_team1 > $match->score_team2) {
            $match->winner_id = $match->team1_id;
            $winnerTeam = Team::findOrFail($match->team1_id);
        } else {
            $match->winner_id = $match->team2_id;
            $winnerTeam = Team::findOrFail($match->team2_id);
        }

        // Ajouter des points à l'équipe gagnante
        $winnerTeam->points += 1;

        // Ajouter une médaille si la phase est une finale
        if ($match->phase->name == 'Final') {
            $winnerTeam->medailles += 1;
        }

        $match->save();
        $winnerTeam->save();


        return redirect()->back()->with('success', 'Les points ont été enregistrés avec succès.');
    }

    // Dans PhaseController
    public function getPhasesByEvent($eventId)
    {
        $phases = Phase::where('event_id', $eventId)->get();
        return response()->json($phases);
    }

    // Dans MatchController
    public function getMatchesByPhase($phaseId)
    {
        $matches = Matche::with(['team1', 'team2'])->where('phase_id', $phaseId)->get();
        return response()->json($matches);
    }

}

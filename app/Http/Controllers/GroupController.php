<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Team;

class GroupController extends Controller
{
    public function showGroup()
    {
        $events = Event::all();
        $teams = Team::all();
        $degrees = Degree::all();

        return view('resultats', compact('events', 'teams', 'degrees'))->with('message', 'heloo');
    }
}

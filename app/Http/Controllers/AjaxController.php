<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class AjaxController extends Controller
{
    public function getTeams() {
        $teams = Team::select('teams.*', 'degrees.name as degree_name')
            ->join('degrees', 'teams.degree_id', '=', 'degrees.id')
            ->get();

        return response()->json($teams);
    }
}

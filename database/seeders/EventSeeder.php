<?php

namespace Database\Seeders;

use App\Models\Degree;
use App\Models\Event;
use App\Models\Group;
use App\Models\Matche;
use App\Models\Phase;
use App\Models\Team;
use App\Models\TeamsRegisterEvents;
use Carbon\PHPStan\Macro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sen = Degree::create(['name' => 'SEN']);
        $esi = Degree::create(['name' => 'ESI']);
        Degree::create(['name' => 'MEDECINE']);
        Degree::create(['name' => 'ODONTO']);
        Degree::create(['name' => 'STAPS']);

        $equipe = Team::create(['name' => 'a', 'degree_id' => $sen->id, 'points' => 0, 'medailles' => 10]);
        Team::create(['name' => 'b', 'degree_id' => $esi->id, 'points' => 10, 'medailles' => 0]);

        $handball = Event::create(['name' => 'Handball']);
        $teams_register_events = TeamsRegisterEvents::create(['event_id' => $handball->id, 'team_id' => $equipe->id, 'points' => 12]);

        $poule = Phase::create(['name' => 'Poule', 'event_id' => $handball->id]);
        $groupe1 = Group::create(['name' => 'Groupe 1', 'phase_id' => $poule->id]);
        $groupe2 = Group::create(['name' => 'Groupe 2', 'phase_id' => $poule->id]);
        $groupe3 = Group::create(['name' => 'Groupe 3', 'phase_id' => $poule->id]);

        $quart = Phase::create(['name' => 'Quart', 'event_id' => $handball->id]);
        $quart1 = Matche::create(['type' => 'Quart 1', 'phase_id' => $quart->id, 'team1_id' => $equipe->id, 'team2_id' => $equipe->id]);

        $demi = Phase::create(['name' => 'Demi', 'event_id' => $handball->id]);

        $final = Phase::create(['name' => 'Final', 'event_id' => $handball->id]);
    }
}

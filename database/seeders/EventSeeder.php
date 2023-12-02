<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Degree;
use App\Models\Event;
use App\Models\Phase;
use App\Models\Team;
use App\Models\TeamsRegisterEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create degrees
        $degrees = collect([
            'SEN', 'LSH', 'STAPS', 'DSP', 'ESIReims', 'Institut G. Chappaz',
            'Cdc', 'Odonto', 'IUT RCC', 'Inspé', 'Médecine', 'SESG',
            'Pharma', 'IUT Troyes', 'Siège'
        ])->mapWithKeys(function ($degreeName) {
            return [$degreeName => Degree::create(['name' => $degreeName])];
        });

        // List of events
        $events = [
            'Badminton', 'Basket', 'Futsal', 'Handball', 'LazerRun', 'PaletsBretons',
            'RelaisCrossfit', 'RelaisMarathon', 'Sumo', 'TouchRugby', 'Volley'
        ];

        // Create events, phases, teams and associated records
        foreach ($events as $eventName) {
            $event = Event::create(['name' => $eventName]);

            // Phases for each event
            $phases = ['Poule1', 'Poule2', 'Quart1', 'Quart2', 'Quart3', 'Quart4', 'Demi', 'Final'];
            foreach ($phases as $phaseName) {
                Phase::create([
                    'name' => $phaseName,
                    'event_id' => $event->id
                ]);
            }

            // Create two teams for each degree and register them in each event
            foreach ($degrees as $degree) {
                $teamA = Team::create([
                    'name' => 'Team A ' . $degree->name,
                    'degree_id' => $degree->id,
                    'points' => 0,
                    'medailles' => 10
                ]);
                
                $teamB = Team::create([
                    'name' => 'Team B ' . $degree->name,
                    'degree_id' => $degree->id,
                    'points' => 10,
                    'medailles' => 0
                ]);
            }

            

        }
    }
}

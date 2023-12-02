<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Degree;
use App\Models\Event;
use App\Models\Group;
use App\Models\Matche;
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

        // Create events and associated records
        foreach ($events as $eventName) {
            $event = Event::create(['name' => $eventName]);

            // Create two teams for each degree
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

                // Register teams for the event
                TeamsRegisterEvents::create([
                    'event_id' => $event->id,
                    'team_id' => $teamA->id,
                    'points' => 12
                ]);
                
                TeamsRegisterEvents::create([
                    'event_id' => $event->id,
                    'team_id' => $teamB->id,
                    'points' => 8
                ]);

                // Create phases and groups for the event
                $poule = Phase::create(['name' => 'Poule', 'event_id' => $event->id]);
                Group::create(['name' => 'Groupe 1', 'phase_id' => $poule->id]);
                Group::create(['name' => 'Groupe 2', 'phase_id' => $poule->id]);
                Group::create(['name' => 'Groupe 3', 'phase_id' => $poule->id]);

                // Assuming each event has a quarter, semi, and final phase
                $quart = Phase::create(['name' => 'Quart', 'event_id' => $event->id]);
                Matche::create([
                    'type' => 'Quart 1',
                    'phase_id' => $quart->id,
                    'team1_id' => $teamA->id,
                    'team2_id' => $teamB->id
                ]);

                $demi = Phase::create(['name' => 'Demi', 'event_id' => $event->id]);
                $final = Phase::create(['name' => 'Final', 'event_id' => $event->id]);
            }
        }
    }
}

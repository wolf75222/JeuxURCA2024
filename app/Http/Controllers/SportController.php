<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Event;
use App\Models\Matche;
use App\Models\Phase;

class SportController extends Controller
{


    private function getEventData($eventName)
    {
        $event = Event::where('name', $eventName)->first();

        if (!$event) {
            abort(404); // Event not found
        }

        // Fetching matches associated with the event
        $matches = Matche::with(['team1', 'team2', 'phase'])
            ->whereHas('phase', function ($query) use ($event) {
                $query->where('event_id', $event->id);
            })
            ->paginate(10);


        // Fetching top teams based on points in events


        return ['event' => $event, 'matches' => $matches];
    }

    public function badminton()
    {
        $data = $this->getEventData('Badminton');
        return view('events.badminton', $data);
    }

    public function basket()
    {
        $data = $this->getEventData('Basket');
        return view('events.basket', $data);
    }

    public function futsal()
    {
        $data = $this->getEventData('Futsal');
        return view('events.futsal', $data);
    }

    // Repeat for other events like handball, laserRun, etc.

    public function handball()
    {
        $data = $this->getEventData('Handball');
        return view('events.handball', $data);
    }

    public function laserRun()
    {
        $data = $this->getEventData('Laser Run');
        return view('events.laserRun', $data);
    }


    public function paletsBretons()
    {
        $data = $this->getEventData('Palets Bretons');
        return view('events.paletsBretons', $data);
    }

    public function relaisCrossfit()
    {
        $data = $this->getEventData('Relais Crossfit');
        return view('events.relaisCrossfit', $data);
    }

    public function relaisMarathon()
    {
        $data = $this->getEventData('Relais Marathon');
        return view('events.relaisMarathon', $data);
    }

    public function sumo()
    {
        $data = $this->getEventData('Sumo');
        return view('events.sumo', $data);
    }

    public function touchRugby()
    {
        $data = $this->getEventData('Touch Rugby');
        return view('events.touchRugby', $data);
    }

    public function volley()
    {
        $data = $this->getEventData('Volley');
        return view('events.volley', $data);
    }





}
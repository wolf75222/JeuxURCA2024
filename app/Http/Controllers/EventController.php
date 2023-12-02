<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Phase;
use App\Models\Group;
use App\Models\Matche;
use Illuminate\Http\Request;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(10);
        $phases = Phase::all();
        $groupes = Group::all();
        $matches = Matche::all();


        return view('dashboard.dashboard-event', compact('events', 'phases', 'groupes', 'matches'));
    }


    public function search(Request $request)
    {
        $search = $request->get('search');
        $events = Event::where('name', 'like', '%' . $search . '%')->paginate(10);
        return view('dashboard.dashboard-event', compact('events'));
    }

    public function create()
    {
        $events = Event::all(); // Récupère tous les Évènement

        return view('events.create', compact('events'));
    }



    public function update(Request $request, $id) // Make sure to use the correct parameter type
    {
        $event = Event::findOrFail($id); // Fetch the existing event
    
        // Validation and updating
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $event->name = $validatedData['name'];
        $event->save();
    
        return redirect()->route('dashboard.dashboard-event')->with('success', 'Évènement mis à jour avec succès.');
    }
    
    public function destroySelected(Request $request)
    {
        \Log::info($request->all()); // Continuez à déboguer si nécessaire
        $evenIds = $request->input('selected_events', []);
        \Log::info($evenIds); // Continuez à déboguer si nécessaire

        // Filtrer et mapper les identifiants
        $evenIds = array_filter($evenIds, 'is_numeric');
        $evenIds = array_map('intval', $evenIds);

        // Supprimer les évènement sélectionnés
        Event::whereIn('id', $evenIds)->delete();

        return back()->with('success', 'Les évènement sélectionnés ont été supprimés avec succès.');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $event = Event::create([
            'name' => $validatedData['name'],
        ]);

        return redirect()->route('dashboard.dashboard-event');
    }


}
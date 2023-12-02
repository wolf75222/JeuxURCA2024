{{-- resources/views/dashboard/dashboard-phase.blade.php --}}

@extends('layouts.dashboard', ['title' => 'Tableau de bord'])

@section('content')
<main class="p-4 md:ml-64 h-auto pt-20">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Saisie des Points pour un Match</h2>
            <form action="{{ route('matches.store_points') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <!-- Sélection de l'événement -->
                    <div class="sm:col-span-2">
                        <label for="event_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Événement</label>
                        <select id="event_id" name="event_id" class="bg-gray-50 border ...">
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}">{{ $event->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Sélection de la phase -->
                    <div class="sm:col-span-2">
                        <label for="phase_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phase</label>
                        <select id="phase_id" name="phase_id" class="bg-gray-50 border ...">
                            @foreach ($phases as $phase)
                                <option value="{{ $phase->id }}">{{ $phase->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Sélection du match -->
                    <div class="sm:col-span-2">
                        <label for="match_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Match</label>
                        <select id="match_id" name="match_id" class="bg-gray-50 border ...">
                            @foreach ($matches as $match)
                            <option value="{{ $match->id }}">{{ $match->team1->name ?? 'Équipe 1 non définie' }} vs {{ $match->team2->name ?? 'Équipe 2 non définie' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Saisie du score pour l'équipe 1 -->
                    <div class="w-full">
                        <label for="score_team1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Score de l'équipe 1</label>
                        <input type="number" id="score_team1" name="score_team1" class="bg-gray-50 border ...">
                    </div>
                    <!-- Saisie du score pour l'équipe 2 -->
                    <div class="w-full">
                        <label for="score_team2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Score de l'équipe 2</label>
                        <input type="number" id="score_team2" name="score_team2" class="bg-gray-50 border ...">
                    </div>
                    <div class="sm:col-span-2">
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg ...">Soumettre les Scores</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection

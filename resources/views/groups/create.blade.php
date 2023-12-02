{{-- resources/views/phases/create.blade.php --}}

@extends('layouts.dashboard', ['title' => 'Tableau de bord'])

@section('content')

@php
$phases = App\Models\Phase::all();
@endphp

<main class="p-4 md:ml-64 h-auto pt-20">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Créer un nouveau groupe</h2>
            <form action="{{ route('groups.store_groups') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du groupe</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Entrez le nom du groupe" required>
                    </div>
                    <div class="w-full">
                        <label for="phase_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phase</label>
                        <select id="phase_id" name="phase_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            @foreach ($phases as $phase)
                            <option value="{{ $phase->id }}">{{ $phase->name }} - {{ $phase->event->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Créer le groupe
                </button>
            </form>
        </div>
    </section>
</main>

@endsection
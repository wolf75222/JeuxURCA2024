{{-- resources/views/teams/create.blade.php --}}

@extends('layouts.app', ['title' => 'Gestion de mon équipe'])

@section('content')

@php
$composantes = [
'SEN', 'LSH', 'STAPS', 'DSP', 'ESIReims', 'Institut G. Chappaz',
'Cdc', 'Odonto', 'IUT RCC', 'Inspé', 'Médecine', 'SESG',
'Pharma', 'IUT Troyes', 'Siège'
];

$colors = [
'green', 'blue', 'red', 'yellow', 'indigo', 'purple', 'pink', 'gray'
];
@endphp

<main class="">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Créer une nouvelle équipe</h2>
            <form action="{{ route('teams.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de
                            l'équipe</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Entrez le nom de l'équipe" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea name="description" id="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Décrivez brièvement l'équipe"></textarea>
                    </div>
                    <div class="w-full">
                        <label for="degree"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Composante</label>
                        <select id="degree" name="degree"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($composantes as $composante)
                            <option value="{{ $composante }}">{{ $composante }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full">
                        <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Couleur
                            de l'équipe</label>
                        <select id="color" name="color"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($colors as $color)
                            <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot
                            de passe de l'équipe</label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Entrez un mot de passe pour l'équipe">
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Créer l'équipe
                </button>
            </form>
        </div>
    </section>
</main>

@endsection
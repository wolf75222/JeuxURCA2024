@extends('layouts.app', ['title' => 'Modifier Équipe'])

@section('content')
<main class="">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Modifier Mon Équipe</h2>
            <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de
                        l'équipe</label>
                    <input type="text" id="name" name="name" value="{{ $team->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" name="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>{{ $team->description }}</textarea>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de
                        passe</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="••••••••">
                </div>

                <div class="mb-4">
                    <label for="color"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Couleur</label>
                    <select id="color" name="color"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @php
                        $colors = [
                        'green', 'blue', 'red', 'yellow', 'indigo', 'purple', 'pink', 'gray'
                        ];
                        @endphp
                        @foreach ($colors as $color)
                        <option value="{{ $color }}" {{ $team->color == $color ? 'selected' : '' }}>
                            {{ $color }}
                        </option>
                        @endforeach
                    </select>
                </div>



                <div class="mb-4">
                    <label for="degree"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Composante</label>
                    <select id="degree" name="degree"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        @php
                        $composantes = [
                        'SEN', 'LSH', 'STAPS', 'DSP', 'ESIReims', 'Institut G. Chappaz',
                        'Cdc', 'Odonto', 'IUT RCC', 'Inspé', 'Médecine', 'SESG',
                        'Pharma', 'IUT Troyes', 'Siège'
                        ];
                        @endphp
                        @foreach ($composantes as $composante)
                        <option value="{{ $composante }}" {{ $team->composante == $composante ? 'selected' : '' }}>
                            {{ $composante }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Logo -->
                <div class="mb-4">
                    <p class="mr-2 text-sm font-medium text-gray-900 dark:text-white mb-2">Logo de l'équipe</p>
                    <div class="flex items-center justify-center w-full">
                        <input id="logo" name="logo" type="file" class="hidden" accept="image/jpeg, image/png">
                        <label for="logo"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <!-- Upload icon -->
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Choisissez un fichier</span> ou faites-le glisser ici.</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                            </div>
                        </label>
                    </div>
                </div>


                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Mettre à jour l'équipe
                </button>
            </form>
        </div>
    </section>
</main>
@endsection
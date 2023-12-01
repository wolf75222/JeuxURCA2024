@extends('layouts.app', ['title' => 'Gestion de mon équipe'])

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white dark:bg-gray-900">
        <div class="p-5 text-center">
            <h2 class="text-3xl font-bold mb-5 text-gray-900 dark:text-white">Gestion de mon équipe</h2>

            <!-- Alertes -->
            @if(session('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">
                        Succès :

                    </span> {{ session('success') }}
                </div>
            </div>
            @endif

            @if(session('error'))
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">
                        Erreur :
                    </span> {{ session('error') }}
                </div>
            </div>
            @endif

            @php
            $user = Auth::user();
            $isTeamLeader = $user->hasRole('team leader');
            $team = $user->team;
            @endphp

            @if($team)
            <div class="text-gray-900 dark:text-white text-center">
                <h3 class="text-xl font-bold mb-2 text-gray-700 dark:text-white ">Informations de l'équipe</h3>
                @php
                    $colorClass = '';
                    switch ($team->color) {
                    case 'green':
                    $colorClass = 'bg-green-100 text-green-800';
                    break;
                    case 'blue':
                    $colorClass = 'bg-blue-100 text-blue-800';
                    break;
                    case 'red':
                    $colorClass = 'bg-red-100 text-red-800';
                    break;
                    case 'yellow':
                    $colorClass = 'bg-yellow-100 text-yellow-800';
                    break;
                    case 'indigo':
                    $colorClass = 'bg-indigo-100 text-indigo-800';
                    break;
                    case 'purple':
                    $colorClass = 'bg-purple-100 text-purple-800';
                    break;
                    case 'pink':
                    $colorClass = 'bg-pink-100 text-pink-800';
                    break;
                    case 'gray':
                    $colorClass = 'bg-gray-100 text-gray-800';
                    break;
                    default:
                    $colorClass = 'bg-blue-100 text-blue-800';
                    break;
                    }
                    @endphp
                <dl
                    class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700 mx-auto">
                    @if ($team->image_path)
                    <div class="flex items-center justify-center mb-4">
                    <img class="w-32 h-32 rounded-full" src="{{ asset('storage/' . $team->image_path) }}" alt="{{ $team->name }} image">
                    </div>
                    @else
                    <div class="flex items-center justify-center mb-4">
                        <div class="w-32 h-32 rounded-full {{ $colorClass }} flex items-center justify-center">
                            <span class="text-gray-500 text-5xl">{{ substr($team->name, 0, 1) }}</span>
                        </div>
                    </div>
                    @endif
                    <div class="flex flex-col pb-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nom</dt>
                        <dd class="text-lg font-semibold text-gray-800 dark:text-white">{{ $team->name }}</dd>
                    </div>
                    <div class="flex flex-col py-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Description</dt>
                        <dd class="text-lg font-semibold text-gray-800 dark:text-white">{{ $team->description }}</dd>
                    </div>
                    <div class="flex flex-col py-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Composante</dt>
                        <dd class="text-lg font-semibold text-gray-800 dark:text-white">{{ $team->degree }}</dd>
                    </div>
                    <div class="flex flex-col py-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nombre de membres</dt>
                        <dd class="text-lg font-semibold text-gray-800 dark:text-white">{{ $team->members_count }}</dd>
                    </div>
                    <div class="flex flex-col pt-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Couleur</dt>
                        <dd class="text-lg font-semibold">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $team->color }}-100 text-{{ $team->color }}-800">
                                {{ $team->color }}
                            </span>
                        </dd>
                    </div>
                </dl>
            </div>
            <section class="bg-white dark:bg-gray-900 mt-6">
                <div class="py-8 px-4 mx-auto max-w-screen-xl">
                    <h3 class="text-xl font-bold mb-5 text-gray-700 dark:text-white text-center">Liste des membres</h3>
                    <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @forelse ($team->users as $user)
                        <div class="text-center">
                            <img class="mx-auto mb-4 w-32 h-32 rounded-full" src="{{ $user->profile_photo_url }}"
                                alt="{{ $user->name }} Avatar">
                            <div class="flex flex-col items-center justify-center">
                                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    <div class="flex items-center justify-center">
                                        {{ $user->name }}
                                        @if($user->hasRole('team leader'))
                                        <svg class="w-4 h-4 ml-2 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                        @endif
                                    </div>
                                </h4>
                                <p class="text-gray-500 mt-1">{{ $user->email }}</p>
                            </div>
                        </div>
                        @empty
                        <p class="text-center">Aucun membre dans cette équipe.</p>
                        @endforelse
                    </div>
                </div>
            </section>



            <!-- Boutons d'action -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-6">
                @if($isTeamLeader)
                <a href="{{ route('teams.edit', $team->id) }}"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 18">
                        <path
                            d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                        <path
                            d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                    </svg>
                    Modifier mon équipe
                </a>
                @endif
                <form action="{{ route('teams.leave', $team->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-600 rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                        Quitter cette équipe
                    </button>
                </form>
            </div>
            @else
            <div class="mt-6">
                <h3 class="text-xl font-bold mb-2 text-gray-700 dark:text-white">Rejoindre ou créer une équipe</h3>
                <form action="{{ route('teams.join') }}" method="POST" class="max-w-sm mx-auto">
                    @csrf
                    <div class="mb-4">
                        <label for="team"
                            class="form-label block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sélectionnez
                            une équipe</label>
                        <select id="team" name="team"
                            class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="password"
                            class="form-label block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe
                            de l'équipe</label>
                        <input type="password" id="password" name="password"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Mot de passe de l'équipe" required>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                        Rejoindre l'équipe
                    </button>

                </form>
                <a href="{{ route('teams.createnew') }}"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Créer une nouvelle équipe
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
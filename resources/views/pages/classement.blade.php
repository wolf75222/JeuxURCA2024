@extends('layouts.app', ['title' => 'Classement'])
@props(['teams_medaille', 'teams_point'])

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
        <div class="p-5">
            <h2 class="text-3xl font-bold mb-5 text-gray-900 dark:text-white">Classement général des équipes</h2>

            <p class="mb-8 dark:text-white">Bienvenue sur la page de classement des Jeux de l'URCA 2024 !
                <br>
                Vous pouvez consulter ici les classements par points et par médailles des équipes participantes.



            </p>
            <div class="overflow-x-auto">
                <h1 class="text-2xl font-bold mb-5 text-gray-900 dark:text-white">Classement par Points</h1>
                <p class="mb-8 dark:text-white">Classement par Points : Suivez les performances des équipes à travers les différents sports. Plus une équipe performe, plus elle accumule de points.

                </p>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Logo</th>
                            <th scope="col" class="px-6 py-3">Nom</th>
                            <th scope="col" class="px-6 py-3">Membres</th>
                            <th scope="col" class="px-6 py-3">Composante</th>
                            <th scope="col" class="px-6 py-3">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams_point as $team)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
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

                    @if ($team->image_path)
                        <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $team->image_path) }}" alt="{{ $team->name }} image">
                    @else
                        <div class="w-10 h-10 rounded-full {{ $colorClass }} flex items-center justify-center">
                            <span class="text-gray-500 text-lg">{{ substr($team->name, 0, 1) }}</span>
                        </div>
                    @endif
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $team->name }}
                            </th>
                            <td class="px-6 py-4">
                                @foreach ($team->users as $user)
                                    <p>{{ $user->name }}</p> {{-- or any other property of the user --}}
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                {{ $team->degree->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $team->points }}
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $teams_point->links('components.UI.pagination') }}

                <h1 class="text-2xl font-bold mb-5 text-gray-900 dark:text-white mt-16">Classement par Médailles</h1>

                <p class="mb-8 dark:text-white">Classement par Médailles : Découvrez les équipes qui se distinguent par le nombre de médailles d'or, d'argent et de bronze remportées.</p>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Logo</th>
                            <th scope="col" class="px-6 py-3">Nom</th>
                            <th scope="col" class="px-6 py-3">Membres</th>
                            <th scope="col" class="px-6 py-3">Composante</th>
                            <th scope="col" class="px-6 py-3">Medailles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams_medaille as $team)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
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

                    @if ($team->image_path)
                        <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $team->image_path) }}" alt="{{ $team->name }} image">
                    @else
                        <div class="w-10 h-10 rounded-full {{ $colorClass }} flex items-center justify-center">
                            <span class="text-gray-500 text-lg">{{ substr($team->name, 0, 1) }}</span>
                        </div>
                    @endif
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $team->name }}
                            </th>
                            <td class="px-6 py-4">
                                @foreach ($team->users as $user)
                                    <p>{{ $user->name }}</p> {{-- or any other property of the user --}}
                                @endforeach
                            </td>
                            
                            <td class="px-6 py-4">
                                {{ $team->degree->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $team->medailles }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="mt-4">
        {{ $teams_medaille->links('components.UI.pagination') }}
    </div>

        </div>
    </div>
</div>
@endsection
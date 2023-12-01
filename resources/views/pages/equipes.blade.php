@extends('layouts.app', ['title' => 'Liste des Équipes'])

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
        <div class="p-5">
            <h2 class="text-3xl font-bold mb-5 text-gray-900 dark:text-white">Liste des Équipes</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Logo</th>
                            <th scope="col" class="px-6 py-3">Nom</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Composante</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $team)
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
                                {{ $team->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $team->degree }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="mt-4">
        {{ $teams->links('components.UI.pagination') }}
    </div>

        </div>
    </div>
</div>
@endsection

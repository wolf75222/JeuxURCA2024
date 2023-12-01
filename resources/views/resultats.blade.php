<x-app-layout>
    <script>
        const ajaxUrl = '{{ URL::to('/ajax/getTeams') }}';
        const csrfToken = '{{ csrf_token() }}';
        const is_editor = {{ auth()->check() ? 1 : 0 }};
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js" defer></script>
    <script src="{{ asset('js/table.js') }}" defer></script>
    <div class="lg:grid"></div>

    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#D81911] to-[#2294D9] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
             style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>

    <div class="mx-auto px-6 py-32 sm:pt-48 lg:pt-56">
        <div class="text-center">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Classement général</h1>
            <p class="mt-6 text-lg leading-8 text-gray-600">Suivez l'évolution des équipes tout au long du tournoi.</p>
        </div>

        <div class="text-md my-12 mx-auto max-w-screen-lg rounded-xl ring-1 ring-gray-900/10 relative overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <div class="flex items-center">
                        <label for="search" class="sr-only">Rechercher</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                     fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input type="text" oninput="search_name()" id="search"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                   placeholder="Rechercher" required="">
                        </div>
                    </div>
                </div>

                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                        type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400"
                         viewbox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                              clip-rule="evenodd"/>
                    </svg>
                    Filter par composante
                    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                    </svg>
                </button>
                <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                    <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                        @foreach($degrees as $degree)
                            <li class="flex items-center">
                                <input onclick="filter()" id="{{ $degree->name }}" type="checkbox" value=""
                                       class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 focus:ring-2">
                                <label for="{{ $degree->name }}"
                                       class="ml-2 text-sm font-medium text-gray-900">{{ $degree->name }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <form class="" action="{{ route('update.score.teams') }}" method="post">
                @csrf
                <div class="overflow-x-auto">
                    <table id="teamsTable" class="w-full text-left">
                        <thead class="text-sm border-t dark:border-gray-700 text-gray-700 uppercase">
                        <tr>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center">
                                    médailles
                                    <button type="button" class="hidden" id="medailles_btn" onclick="sort()">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                             class="w-5 h-5 ml-2" style="margin-left: 5px;">
                                            <path fill-rule="evenodd"
                                                  d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center">
                                    points
                                    <button type="button" class="" id="points_btn" onclick="sort()">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                             class="w-5 h-5 ml-2" style="margin-left: 5px;">
                                            <path fill-rule="evenodd"
                                                  d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">équipe</th>
                            <th scope="col" class="px-4 py-3">composante</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teams->sortByDesc('medailles')->take(10) as $key => $team)
                            <tr class="{{ $loop->index == 0 ? 'bg-[#C9B037]/25' : ($loop->index == 1 ? 'bg-[#D7D7D7]/25' : ($loop->index == 2 ? 'bg-[#AD8A56]/25' : '')) }}  border-b dark:border-gray-700">
                                @if(auth()->check())
                                    <td class="px-4 py-3 medailles">
                                        <input required=""
                                               class="text-right block w-14 rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                               type="text" name="teams[{{ $team->id }}][medailles]"
                                               value="{{ $team->medailles }}">
                                    </td>
                                    <td class="px-4 py-3 points">
                                        <input required=""
                                               class="text-right block w-14 rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                               type="text" name="teams[{{ $team->id }}][points]"
                                               value="{{ $team->points }}">
                                    </td>
                                @else
                                    <td class="px-4 py-3 medailles">{{ $team->medailles }}</td>
                                    <td class="px-4 py-3 points">{{ $team->points }}</td>
                                @endif
                                <td class="px-4 py-3">{{ $team->name }}</td>
                                <td class="px-4 py-3">{{ $team->degree->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                     aria-label="Table navigation">
                    <button type="submit"
                            class="space-y-3 md:space-y-0 p-4 w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Save
                    </button>

                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <button type="button" onclick="previous_page()"
                                    class="h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </li>
                        <li>
                            <p id="page"
                               class="text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300">
                                1</p>
                        </li>
                        <li>
                            <button type="button" onclick="next_page()"
                                    class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>

        <div class="absolute inset-x-0 top-[calc(100%-16rem)] -z-10 transform-gpu overflow-hidden blur-3xl"
             aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#D81911] to-[#2294D9] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                 style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>

        @foreach($events as $event)
            <div class="mx-auto my-32 max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-screen-lg sm:text-center">
                    <div class="flex items-center justify-center gap-6">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Résultats de {{ $event->name }}</h1>
                        @if(auth()->check())
                            <div x-data="{ m_delete_event{{ $event->id }}: false }" class="flex items-center">
                                <!-- Button to open the modal -->
                                <button @click="m_delete_event{{ $event->id }} = true" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                         class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                              d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                              clip-rule="evenodd"/>
                                    </svg>

                                </button>

                                <!-- Modal overlay -->
                                <div x-show="m_delete_event{{ $event->id }}" style="display: none;"
                                     class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                                    <!-- Modal content -->
                                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                            <!-- Modal panel -->
                                            <div x-show="m_delete_event{{ $event->id }}"
                                                 class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                <form class=""
                                                      action="{{ route('delete.event', ['event_id' => $event->id]) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                                            <h3 class="text-base font-semibold leading-6 text-gray-900">
                                                                Valider la suppression de
                                                                l'évènement {{ $event->name }}</h3>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-gray-500">
                                                                    Êtes-vous sûr de vouloir supprimer cet événement ?
                                                                    Cette action est irréversible et toutes les données
                                                                    associées seront perdues.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                        <button type="submit"
                                                                class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                                            Supprimer
                                                        </button>
                                                        <button @click="m_delete_event{{ $event->id }} = false"
                                                                type="button"
                                                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                            Annuler
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="mt-12 mx-auto font-medium text-center text-gray-900/40 p-1 rounded-full ring-1 ring-gray-900/10 w-fit dark:text-gray-400 dark:border-gray-700">
                        <div class="flex flex-wrap">
                            @foreach($event->phases as $phase)
                                <div class="selector {{ $phase->name }} flex flex-row items-center py-0.5 px-3 rounded-full {{ $loop->index == 0 ? 'bg-gray-100' : '' }} text-black">
                                    <button type="button"
                                            class="text-black"
                                            onclick="toggleVisibility('{{ $event->name }}', '{{ $phase->name }}');">
                                        {{ $phase->name }}
                                    </button>
                                    @if(auth()->check())
                                        <div x-data="{ m_delete_phase{{ $phase->id }}: false }"
                                             class="flex items-center">
                                            <!-- Button to open the modal -->
                                            <button @click="m_delete_phase{{ $phase->id }} = true" type="button"
                                                    class="{{ $loop->index == 0 ? '' : 'hidden' }} selectorbin {{ $phase->name }} pl-2 text-black">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                     fill="currentColor" class="w-5 h-5">
                                                    <path fill-rule="evenodd"
                                                          d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </button>

                                            <!-- Modal overlay -->
                                            <div x-show="m_delete_phase{{ $phase->id }}" style="display: none;"
                                                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                                                <!-- Modal content -->
                                                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                        <!-- Modal panel -->
                                                        <div x-show="m_delete_phase{{ $phase->id }}"
                                                             class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                            <form class=""
                                                                  action="{{ route('delete.phase', ['phase_id' => $phase->id]) }}"
                                                                  method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                                    <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                                                        <h3 class="text-base font-semibold leading-6 text-gray-900">
                                                                            Valider la suppression de la
                                                                            phase {{ $phase->name }}</h3>
                                                                        <div class="mt-2">
                                                                            <p class="text-sm text-gray-500">
                                                                                Êtes-vous sûr de vouloir supprimer cette
                                                                                phase ? Cette action est irréversible et
                                                                                toutes les données associées seront
                                                                                perdues.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                                    <button type="submit"
                                                                            class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                                                        Supprimer
                                                                    </button>
                                                                    <button @click="m_delete_phase{{ $phase->id }} = false"
                                                                            type="button"
                                                                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                                        Annuler
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            @if(auth()->check())
                                <div x-data="{ m_create_phase: false }" class="flex items-center px-2">
                                    <!-- Button to open the modal -->
                                    <button @click="m_create_phase = true" type="button" class="text-black">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                             class="w-5 h-5">
                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"/>
                                        </svg>
                                    </button>

                                    <!-- Modal overlay -->
                                    <div x-show="m_create_phase" style="display: none;"
                                         class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                                        <!-- Modal content -->
                                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                <!-- Modal panel -->
                                                <div x-show="m_create_phase"
                                                     class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                    <form class=""
                                                          action="{{ route('create.phase', ['event_id' => $event->id]) }}"
                                                          method="post">
                                                        @csrf
                                                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                            <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                                                <h3 class="text-base font-semibold leading-6 text-gray-900">
                                                                    Ajouter une phase</h3>
                                                                <div class="mt-2">
                                                                    <p class="text-sm text-gray-500">Une phase
                                                                        correspond au temps fort d'une compétition ;
                                                                        elle peut être composée de groupes associés à un
                                                                        système de points, de matches, ou bien des deux.
                                                                    </p>
                                                                </div>
                                                                <h3 class="text-base font-semibold leading-4 text-gray-900 mt-4">
                                                                    Nom de la phase</h3>
                                                                <input required=""
                                                                       class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                                       type="text" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                            <button type="submit"
                                                                    class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">
                                                                Ajouter
                                                            </button>
                                                            <button @click="m_create_phase = false" type="button"
                                                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                                Annuler
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @foreach($event->phases as $key => $phase)
                    <div id="{{ $phase->name }}"
                         class="{{ $event->name }} {{ $key == 0 ? '' : 'hidden' }} mx-auto grid mt-6 grid-cols-1 gap-x-8 gap-y-16 sm:py-6 lg:mx-0 lg:max-w-none lg:grid-cols-{{ min(3, 1 + count($phase->groups ?? []) + count($phase->matches ?? [])) }}">
                        @foreach($phase->groups as $group)
                            <div class="text-center w-fit mx-auto">
                                @if(auth()->check())
                                    <div x-data="{ m_delete_group{{ $group->id }}: false }"
                                         class="flex justify-center items-center pb-4">

                                        <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">{{ $group->name }}</h3>

                                        <!-- Button to open the modal -->
                                        <button @click="m_delete_group{{ $group->id }} = true" type="button"
                                                class="pl-2 text-black">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd"
                                                      d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                      clip-rule="evenodd"/>
                                            </svg>

                                        </button>

                                        <!-- Modal overlay -->
                                        <div x-show="m_delete_group{{ $group->id }}" style="display: none;"
                                             class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                                            <!-- Modal content -->
                                            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                    <!-- Modal panel -->
                                                    <div x-show="m_delete_group{{ $group->id }}"
                                                         class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                        <form class=""
                                                              action="{{ route('delete.group', ['group_id' => $group->id]) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                                <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                                                    <h3 class="text-base font-semibold leading-6 text-gray-900">
                                                                        Supprimer le groupe {{ $group->name }}</h3>
                                                                    <div class="mt-2">
                                                                        <p class="text-sm text-gray-500">Êtes-vous sûr
                                                                            de vouloir supprimer ce groupe ? Cette
                                                                            action est irréversible et toutes les
                                                                            données associées seront perdues.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                                <button type="submit"
                                                                        class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                                                    Supprimer
                                                                </button>
                                                                <button @click="m_delete_group{{ $group->id }} = false"
                                                                        type="button"
                                                                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                                    Annuler
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <h3 class="text-lg pb-4 font-semibold leading-6 text-gray-900 group-hover:text-gray-600">{{ $group->name }}</h3>
                                @endif
                                <div class="overflow-x-auto rounded-lg ring-1 ring-gray-900/10">
                                    <table class="w-full text-left">
                                        <thead class="border-b text-sm dark:border-gray-700 text-gray-700 uppercase dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">pt</th>
                                            <th scope="col" class="px-4 py-3">équipe</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($group->teams->sortByDesc('points') as $team_group)
                                            <tr class="dark:border-gray-700 border-b last:border-none">
                                                <td class="px-4 py-3">
                                                    @if(auth()->check())
                                                        <input required=""
                                                               class="team-points text-right block w-14 rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                               type="text"
                                                               name="teams[{{ $team_group->team_id }}][{{ $group->id }}]"
                                                               value="{{ $team_group->points }}">
                                                    @else
                                                        {{ $team_group->points }}
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3">{{ $team_group->team->name }}</td>
                                                <td class="px-4 py-3">
                                                    <form class=""
                                                          action="{{ route('remove.team.to.group', ['group_id' => $group->id, 'team_id' => $team_group->team->id]) }}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                 fill="currentColor" class="w-5 h-5">
                                                                <path fill-rule="evenodd"
                                                                      d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                                      clip-rule="evenodd"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="dark:border-gray-700 border-b last:border-none">
                                            <form class=""
                                                  action="{{ route('add.team.to.group', ['group_id' => $group->id]) }}"
                                                  method="post">
                                                @csrf
                                                <th class="px-4 py-3">
                                                    <select id="team_id" name="team_id" autocomplete="country-name"
                                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                        @foreach ($event->register_teams as $team)
                                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </th>
                                                <th class="px-4 py-3">
                                                    <button type="submit"
                                                            class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">
                                                        Ajouter
                                                    </button>
                                                </th>
                                            </form>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                        @foreach($phase->matches as $match)
                            <div class="text-center w-fit mx-auto">
                                @if(auth()->check())
                                    <div x-data="{ m_delete_match{{ $match->id }}: false }"
                                         class="flex justify-center items-center pb-4">

                                        <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">{{ $match->type }}</h3>

                                        <!-- Button to open the modal -->
                                        <button @click="m_delete_match{{ $match->id }} = true" type="button"
                                                class="pl-2 text-black">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd"
                                                      d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                      clip-rule="evenodd"/>
                                            </svg>

                                        </button>

                                        <!-- Modal overlay -->
                                        <div x-show="m_delete_match{{ $match->id }}" style="display: none;"
                                             class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                                            <!-- Modal content -->
                                            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                    <!-- Modal panel -->
                                                    <div x-show="m_delete_match{{ $match->id }}"
                                                         class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                        <form class=""
                                                              action="{{ route('delete.match', ['match_id' => $match->id]) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                                <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                                                    <h3 class="text-base font-semibold leading-6 text-gray-900">
                                                                        Supprimer le match {{ $match->type }}</h3>
                                                                    <div class="mt-2">
                                                                        <p class="text-sm text-gray-500">Êtes-vous sûr
                                                                            de vouloir supprimer ce match ? Cette action
                                                                            est irréversible et toutes les données
                                                                            associées seront perdues.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                                <button type="submit"
                                                                        class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                                                    Supprimer
                                                                </button>
                                                                <button @click="m_delete_match{{ $match->id }} = false"
                                                                        type="button"
                                                                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                                    Annuler
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <h3 class="text-lg pb-4 font-semibold leading-6 text-gray-900 group-hover:text-gray-600">{{ $match->type }}</h3>
                                @endif

                                <div class="overflow-x-auto rounded-lg ring-1 ring-gray-900/10">
                                    <table class="w-full text-left">
                                        <tbody>
                                        <tr class="border-b dark:border-gray-700">
                                            <th scope="row" class="px-4 py-3">
                                                @if($match->team1->id == $match->winner_id)
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0"/>
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                         fill="currentColor" class="w-5 h-5">
                                                        <path d="M6.75 9.25a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5z"/>
                                                    </svg>
                                                @endif
                                            </th>
                                            <td class="px-4 py-3">{{ $match->team1->name }}</td>
                                        </tr>
                                        <tr class="border-b dark:border-gray-700">
                                            <th scope="row" class="px-4 py-3">
                                                @if($match->team2->id == $match->winner_id)
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0"/>
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                         fill="currentColor" class="w-5 h-5">
                                                        <path d="M6.75 9.25a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5z"/>
                                                    </svg>
                                                @endif
                                            </th>
                                            <td class="px-4 py-3">{{ $match->team2->name }}</td>
                                        </tr>
                                        <tr class="border-b dark:border-gray-700">
                                            <th class="px-4 py-3">
                                                Gagnant
                                            </th>
                                            <th scope="row" class="px-4 py-3">
                                                <select id="match{{ $match->id }}" name="match{{ $match->id }}"
                                                        autocomplete="country-name"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                    @foreach ($event->register_teams as $team)
                                                        <option value="{{ $team->id }}" {{ $match->winner_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                                                    @endforeach
                                                    <option value="null" {{ $match->winner_id === null ? 'selected' : '' }} >
                                                        à venir
                                                    </option>
                                                </select>
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                        <div class="text-center w-fit mx-auto">
                            <h3 class="text-lg pb-4 font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                Opérations</h3>

                            <div class="overflow-x-auto rounded-lg ring-1 ring-gray-900/10">
                                <table class="w-full text-left">
                                    <tbody>
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3">
                                            <div x-data="{ m_create_group{{ $phase->name }}: false }" class="">
                                                <!-- Button to open the modal -->
                                                <button @click="m_create_group{{ $phase->name }} = true" type="button"
                                                        class="flex items-center gap-4 flex-row-reverse">
                                                    Ajouter un groupe
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                                                    </svg>
                                                </button>

                                                <!-- Modal overlay -->
                                                <div x-show="m_create_group{{ $phase->name }}" style="display: none;"
                                                     class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                                                    <!-- Modal content -->
                                                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                            <!-- Modal panel -->
                                                            <div x-show="m_create_group{{ $phase->name }}"
                                                                 class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                                <form class=""
                                                                      action="{{ route('create.group', ['phase_id' => $phase->id]) }}"
                                                                      method="post">
                                                                    @csrf
                                                                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                                                            <h3 class="text-base font-semibold leading-6 text-gray-900">
                                                                                Ajouter un groupe</h3>
                                                                            <div class="mt-2">
                                                                                <p class="text-sm text-gray-500">
                                                                                    La création de groupes, que ce soit
                                                                                    des poules ou des catégories de
                                                                                    poids comme dans le judo, vise à
                                                                                    assurer des affrontements équitables
                                                                                    en répartissant les participants
                                                                                    selon des critères tels que le
                                                                                    niveau de compétence ou le
                                                                                    poids.</p>
                                                                            </div>
                                                                            <h3 class="text-base font-semibold leading-6 text-gray-900 mt-4">
                                                                                Nom du groupe</h3>
                                                                            <input required=""
                                                                                   class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                                                   type="text" name="name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                                        <button type="submit"
                                                                                class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">
                                                                            Ajouter
                                                                        </button>
                                                                        <button @click="m_create_group{{ $phase->name }} = false"
                                                                                type="button"
                                                                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                                            Annuler
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3">
                                            <div x-data="{ m_create_match{{ $phase->name }}: false }" class="">
                                                <!-- Button to open the modal -->
                                                <button @click="m_create_match{{ $phase->name }} = true" type="button"
                                                        class="flex items-center gap-4 flex-row-reverse">
                                                    Ajouter un match
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0"/>
                                                    </svg>

                                                </button>

                                                <!-- Modal overlay -->
                                                <div x-show="m_create_match{{ $phase->name }}" style="display: none;"
                                                     class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                                                    <!-- Modal content -->
                                                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                            <!-- Modal panel -->
                                                            <div x-show="m_create_match{{ $phase->name }}"
                                                                 class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                                <form class=""
                                                                      action="{{ route('create.match', ['phase_id' => $phase->id]) }}"
                                                                      method="post">
                                                                    @csrf
                                                                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                                                            <h3 class="text-base font-semibold leading-6 text-gray-900">
                                                                                Ajouter un match</h3>
                                                                            <div class="mt-2">
                                                                                <p class="text-sm text-gray-500">
                                                                                    La création d'un match, qu'il
                                                                                    s'agisse d'un affrontement principal
                                                                                    ou consolant, vise à orchestrer des
                                                                                    rencontres équilibrées en tenant
                                                                                    compte des performances antérieures
                                                                                    des participants, offrant ainsi une
                                                                                    expérience compétitive et
                                                                                    stimulante.</p>
                                                                            </div>
                                                                            <h3 class="my-2 text-base font-semibold leading-6 text-gray-900">
                                                                                Nom du match</h3>
                                                                            <input required=""
                                                                                   class="mt-3 block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                                                   type="text" name="type">
                                                                            <h3 class="my-2 text-base font-semibold leading-6 text-gray-900">
                                                                                Equipe 1</h3>
                                                                            <select id="team1_id" name="team1_id"
                                                                                    autocomplete="country-name"
                                                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                                                @foreach ($event->register_teams as $team)
                                                                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <h3 class="my-2 text-base font-semibold leading-6 text-gray-900">
                                                                                Equipe 2</h3>
                                                                            <select id="team2_id" name="team2_id"
                                                                                    autocomplete="country-name"
                                                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                                                @foreach ($event->register_teams as $team)
                                                                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                                        <button type="submit"
                                                                                class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">
                                                                            Ajouter
                                                                        </button>
                                                                        <button @click="m_create_match{{ $phase->name }} = false"
                                                                                type="button"
                                                                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                                            Cancel
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3">
                                            <button class="flex items-center gap-4 flex-row-reverse"
                                                    onclick="updatePoints('{{ route('update.groups.points') }}', '{{ route('update.matches.results') }}', '{{ csrf_token() }}')">
                                                Enregistrer
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                                </svg>

                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                @endforeach
                <div class="overflow-x-auto mt-12 rounded-xl ring-1 ring-gray-900/10 w-fit mx-auto">
                    <table class="w-full text-left">
                        <thead class="text-sm text-gray-700 uppercase">
                        <tr>
                            <th scope="col" class="px-4 py-3">points</th>
                            <th scope="col" class="px-4 py-3">équipe</th>
                            <th scope="col" class="px-4 py-3">composante</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form class="" action="{{ route('update.score.phase') }}" method="post">
                            @csrf
                            @foreach($event->register_teams->sortByDesc('current_points') as $registration)
                                <tr class="{{ $loop->index == 0 ? 'bg-[#C9B037]/25' : ($loop->index == 1 ? 'bg-[#D7D7D7]/25' : ($loop->index == 2 ? 'bg-[#AD8A56]/25' : '')) }}  border-b dark:border-gray-700">

                                    @if(auth()->check())
                                        <td class="px-4 py-3">
                                            <input required=""
                                                   class="text-right block w-14 rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                   type="text" name="ids[{{ $registration->registration_id }}]"
                                                   value="{{ $registration->current_points }}">
                                        </td>
                                    @else
                                        <td class="px-4 py-3">{{ $registration->current_points }}</td>

                                    @endif
                                    <td class="px-4 py-3">{{ $registration->name }}</td>
                                    <td class="px-4 py-3">{{ $registration->degree->name }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="px-4 py-3">
                                    <button type="submit"
                                            class="space-y-3 md:space-y-0 p-4 w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Enregistrer
                                    </button>
                                </td>
                            </tr>
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

        <div class="mx-auto my-32 max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-screen-lg sm:text-center">
                    <div class="flex items-center justify-center gap-6">
                        @if(auth()->check())
                            <div x-data="{ m_create_event: false }" class="">
                                <!-- Button to open the modal -->
                                <button @click="m_create_event = true" type="button" class="flex items-center gap-6">
                                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Ajouter un évènement</h1>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>


                                </button>

                                <!-- Modal overlay -->
                                <div x-show="m_create_event" style="display: none;"
                                     class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
                                    <!-- Modal content -->
                                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                            <!-- Modal panel -->
                                            <div x-show="m_create_event"
                                                 class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                <form class=""
                                                      action="{{ route('create.event') }}"
                                                      method="post">
                                                    @csrf
                                                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                                            <h3 class="text-base font-semibold leading-6 text-gray-900">
                                                                Ajouter un évènement</h3>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-gray-500">
                                                                    Donnez à votre événement, que ce soit une course de vélo palpitante ou un tournoi de handball passionnant, un nom distinctif qui captivera l'attention et suscitera l'enthousiasme des participants.</p>
                                                            </div>
                                                            <h3 class="text-base font-semibold leading-6 text-gray-900 mt-4">
                                                                Nom de l'évènement</h3>
                                                            <input required=""
                                                                   class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                                   type="text" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                        <button type="submit"
                                                                class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">
                                                            Ajouter
                                                        </button>
                                                        <button @click="m_create_event = false"
                                                                type="button"
                                                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                            Annuler
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </div>

</x-app-layout>

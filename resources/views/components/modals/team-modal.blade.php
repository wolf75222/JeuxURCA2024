{{-- resources/views/components/modals/team-modal.blade.php --}}

<!-- Status : factorisation -->

<!-- Edit team modal pour l'équipe {{ $team->id }} -->
<div id="editTeamModal-{{ $team->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Modifier une équipe
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-md text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-close="editTeamModal-{{ $team->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

                <!-- Close script -->
                <script>
                    document.querySelectorAll('[data-modal-close]').forEach(button => {
                        button.addEventListener('click', () => {
                            const modalId = button.getAttribute('data-modal-close');
                            const modal = document.getElementById(modalId);
                            if (modal) {
                                modal.classList.add('hidden');
                                const backdrop = document.querySelector('.modal-backdrop');
                                if (backdrop) {
                                    backdrop.remove();
                                }
                                document.body.classList.remove('modal-open');
                                location.reload();
                            }
                        });
                    });
                </script>
            </div>
            <!-- Modal body -->
            <form action="{{ route('teams.update', $team->id) }}" method="POST">
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
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
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


                <!-- Additional fields specific to the team -->

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Mettre
                    à jour</button>
            </form>
        </div>
    </div>
</div>
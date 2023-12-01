{{-- resources/views/components/tables/table-dashboard.blade.php --}}

<!-- Status : factorisation -->


@props(['users', 'roles', 'teams'])

<div class="relative h-96 mb-4 shadow-md sm:rounded-lg">
    <div class="overflow-auto h-full rounded-lg bg-white dark:bg-gray-900">
        <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 dark:text-white bg-white dark:bg-gray-800">
                Liste des derniers utilisateurs
                <p class="mt-1 text-sm text-left text-gray-500 dark:text-gray-400">Consultez la liste des derniers utilisateurs inscrits avec leurs rôles, dates d'inscription et de dernière mise à jour.</p>
            </caption>
            <thead class="text-xs bg-gray-50 dark:bg-gray-700 dark:text-gray-400 rounded-lg">
                <tr>
                    <th scope="col" class="px-4 py-2">
                        Nom
                    </th>
                    <th scope="col" class="px-4 py-2">
                        Role
                    </th>
                    <th scope="col" class="px-4 py-2">
                        Date d'inscription
                    </th>
                    <th scope="col" class="px-4 py-2">
                        Dernière mise à jour
                    </th>
                    <th scope="col" class="px-4 py-2">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="{{ $user['profile_photo_url'] }}" alt="{{ $user['name'] }} image">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $user['name'] }}</div>
                            <div class="font-normal text-gray-500">{{ $user['email'] }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->getRoleNames()->join(', ') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($user['created_at'])->format('d/m/Y H:i:s') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($user['updated_at'])->format('d/m/Y H:i:s') }}
                    </td>
                    <td class="px-6 py-4 flex items-center">
                    <!-- Bouton Modifier -->
                    <a href="#" class="mr-3" data-modal-target="editUserModal-{{ $user->id }}"
                        data-modal-toggle="editUserModal-{{ $user->id }}">
                        <svg class="w-5 h-5 text-blue-600 dark:text-gray-400 hover:text-blue-800 dark:hover:text-gray-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                            <path
                                d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                        </svg>
                    </a>
                    <!-- Bouton Voir -->
                    <a href="#" data-modal-target="showUserModal-{{ $user->id }}"
                        data-modal-toggle="showUserModal-{{ $user->id }}">
                        <svg class="w-5 h-5 text-blue-600 dark:text-gray-400 hover:text-blue-800 dark:hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 14">
                            <path
                                d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                        </svg>
                    </a>
                </td>
                </tr>
                
                @include('components.modals.user-modal', ['user' => $user])
                @include('components.modals.show-user-modal', ['user' => $user])
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function showModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
        }
    }
</script>

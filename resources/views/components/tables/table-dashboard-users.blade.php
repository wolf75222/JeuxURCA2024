@props(['users', 'roles', 'teams'])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div
        class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
        <div>
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                type="button">
                <span class="sr-only">Action button</span>
                Action
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownAction"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            onclick="handleAction('resetProfilePhoto')">Réinitialiser la/les photo(s) de profil</a>
                    </li>
                    <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="handleAction('create')">Créer un utilisateur</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                        onclick="handleAction('delete')">Supprimer le(s) utilisateur(s)</a>
                </div>
            </div>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <form action="{{ route('users.search') }}" method="GET">
                <input type="text" id="table-search-users"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Rechercher des utilisateurs" name="search"
                    onkeydown="if (event.keyCode === 13) this.form.submit();">
            </form>
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" onclick="toggleAllCheckboxes()"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-4 py-2">
                    Nom
                </th>
                <th scope="col" class="px-4 py-2">
                    Email
                </th>
                <th scope="col" class="px-4 py-2">
                    Rôle(s)
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
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-{{ $user->id }}" type="checkbox" name="selected_users[]"
                            value="{{ $user->id }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-{{ $user->id }}" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="{{ $user->profile_photo_url }}"
                        alt="{{ $user->name }} image">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{ $user->name }}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    {{ $user->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->getRoleNames()->join(', ') }}
                </td>
                <td class="px-6 py-4">
                    {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}
                </td>
                <td class="px-6 py-4">
                    {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}
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


    <div class="mt-4">
        {{ $users->links('components.UI.pagination') }}
    </div>
</div>

<script>
    function handleAction(action) {
        const selectedCheckboxes = document.querySelectorAll('input[name="selected_users[]"]:checked');
        let selectedUsers = Array.from(selectedCheckboxes).map(checkbox => checkbox.value);

        if (selectedUsers.length > 0 || action === 'create') {
            switch (action) {
                case 'resetProfilePhoto':
                    sendPostRequest('{{ route('users.resetProfilePhoto') }}', selectedUsers);
                    break;
                case 'create':
                    //{{ route('users.create') }}">Créer un utilisateur</a>
                    window.location.href = "{{ route('users.create') }}";
                    break;
                case 'activate':
                    // Handle the 'activate' action
                    break;
                case 'delete':
                    showModal('deleteModal');
                    break;
                default:
                    console.error('Action inconnue:', action);
            }
        } else {
            alert('Veuillez sélectionner au moins un utilisateur.');
        }
    }

    function sendPostRequest(url, userIds) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = url;

        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrfToken);

        userIds.forEach(userId => {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'selected_users[]';
            hiddenInput.value = userId;
            form.appendChild(hiddenInput);
        });

        document.body.appendChild(form);
        form.submit();
    }

    function toggleAllCheckboxes() {
        const checkboxAll = document.getElementById('checkbox-all-search');
        const checkboxes = document.querySelectorAll('input[name="selected_users[]"]');

        checkboxes.forEach(checkbox => {
            checkbox.checked = checkboxAll.checked;
        });
    }

    function showModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
        }
    }
</script>

<!-- Modal de confirmation de suppression -->
@include('components.modals.delete-modal', [
'modalId' => 'deleteModal',
'message' => 'Êtes-vous sûr de vouloir supprimer ces utilisateurs ?',
'confirmAction' => "sendPostRequest('" . route('users.destroySelected') . "', selectedUsers)"
])
<!-- Show user modal pour l'utilisateur {{ $user->id }} -->
<div id="showUserModal-{{ $user->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center w-full h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Contenu du modal -->
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow p-5">
            <!-- Entête du modal -->
            <div class="flex justify-between items-start pb-4 mb-4 border-b dark:border-gray-600">
                <div class="flex items-center">
                    <img class="w-12 h-12 rounded-full" src="{{ $user->profile_photo_url }}"
                        alt="{{ $user->name }} image">
                    <h3 class="text-lg px-6 py-4  font-semibold text-gray-900 dark:text-white">
                        Détails de l'utilisateur
                    </h3>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-md text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-close="showUserModal-{{ $user->id }}"
                    onclick="closeModal('showUserModal-{{ $user->id }}')">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Fermer le modal</span>
                </button>
            </div>
            <!-- Corps du modal -->
            <div class="text-gray-800 dark:text-white">
                <div class="mb-4"><strong>ID :</strong> {{ $user->id }}</div>
                <div class="mb-4"><strong>Nom :</strong> {{ $user->name }}</div>
                <div class="mb-4"><strong>Email :</strong> {{ $user->email }}</div>
                <div class="mb-4"><strong>Email vérifié le :</strong> {{ $user->email_verified_at ?? 'Non vérifié' }}
                </div>
                <div class="mb-4"><strong>Secret à deux facteurs :</strong> {{ $user->two_factor_secret ?? 'Non
                    configuré' }}</div>
                <div class="mb-4"><strong>Codes de récupération à deux facteurs :</strong> {{
                    $user->two_factor_recovery_codes ?? 'Non configuré' }}</div>
                <div class="mb-4"><strong>Deux facteurs confirmés le :</strong> {{ $user->two_factor_confirmed_at ??
                    'Non confirmé' }}</div>
                <div class="mb-4"><strong>Token de souvenir :</strong> {{ $user->remember_token ?? 'Non défini' }}</div>
                <div class="mb-4"><strong>ID de l'équipe actuelle :</strong> {{ $user->current_team_id ?? 'Non défini'
                    }}</div>
                <div class="mb-4"><strong>Chemin de la photo de profil :</strong> {{ $user->profile_photo_path ?? 'Non
                    défini' }}</div>
                <div class="mb-4"><strong>Créé le :</strong> {{ $user->created_at }}</div>
                <div class="mb-4"><strong>Mis à jour le :</strong> {{ $user->updated_at }}</div>
                <div class="mb-4"><strong>Identifiant de l'équipe actuelle :</strong> {{ $user->team_id ?? 'Non
                    défini' }}</div>
                <div class="mb-4"><strong>Roles :</strong>
                    @foreach ($user->roles as $role)
                    @php
                    $colorClass = '';
                    switch ($role->name) {
                    case 'admin':
                    $colorClass = 'bg-green-100 text-green-800';
                    break;
                    case 'user':
                    $colorClass = 'bg-blue-100 text-blue-800';
                    break;
                    case 'organizer':
                    $colorClass = 'bg-orange-100 text-orange-800';
                    break;
                    case 'leader':
                    $colorClass = 'bg-purple-100 text-purple-800';
                    break;
                    default:
                    $colorClass = 'bg-blue-100 text-blue-800';
                    break;
                    }
                    @endphp
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $colorClass }}">
                        {{ $role->name }}
                    </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('modal-open');
            reload();
        }
        if (backdrop) {
            backdrop.remove(); // Retire la div de filtre gris du DOM
        }
    }    
</script>
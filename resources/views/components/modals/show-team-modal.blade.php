{{-- resources/views/components/modals/team-modal.blade.php --}}

@php
$degrees = App\Models\Degree::all();
@endphp

<!-- Show team modal pour l'équipe {{ $team->id }} -->
<div id="showTeamModal-{{ $team->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center w-full h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Contenu du modal -->
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow p-5">
            <!-- Entête du modal -->
            <div class="flex justify-between items-start pb-4 mb-4 border-b dark:border-gray-600">
                <div class="flex items-center">
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
                    <img class="w-12 h-12 rounded-full" src="{{ $team->image_path }}" alt="{{ $team->name }} image">
                    @else
                    <div class="w-12 h-12 rounded-full {{ $colorClass }} flex items-center justify-center">
                        <span class="text-gray-500 text-lg">{{ substr($team->name, 0, 1) }}</span>
                    </div>
                    @endif
                    <h3 class="text-lg px-6 py-4  font-semibold text-gray-900 dark:text-white">
                        Détails de l'équipe
                    </h3>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-md text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-close="showTeamModal-{{ $team->id }}"
                    onclick="closeModal('showTeamModal-{{ $team->id }}')">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Corps du modal -->
            <div class="text-gray-800 dark:text-white">
                <div class="mb-4"><strong>ID :</strong> {{ $team->id }}</div>
                <div class="mb-4"><strong>Nom de l'équipe :</strong> {{ $team->name }}</div>
                <div class="mb-4"><strong>Description :</strong> {{ $team->description }}</div>
                <div class="mb-4"><strong>Composante :</strong> @foreach ($degrees as $degree)
                    @if ($degree->id == $team->degree_id)
                    {{ $degree->name }}
                    @endif
                    @endforeach</div>
                <div class="mb-4"><strong>Nombre de membres :</strong> {{ $team->members_count }}</div>
                <div class="mb-4"><strong>Nombre de points :</strong> {{ $team->points }}</div>
                <div class="mb-4"><strong>Nombre de médailles :</strong> {{ $team->medailles }}</div>
                <div class="mb-4"><strong>Créé le :</strong> {{ $team->created_at }}</div>
                <div class="mb-4"><strong>Mis à jour le :</strong> {{ $team->updated_at }}</div>
                @if(!empty($team->image_path))
                <div class="mb-4"><strong>Chemin de l'image :</strong> {{ $team->image_path }} </div>
                @else
                <div class="mb-4"><strong>Chemin de l'image :</strong> Aucune image disponible </div>
                @endif
                <div class="mb-4"><strong>Mot de passe :</strong> {{ $team->password }}</div>
                <div class="mb-4  "><strong>Couleur :</strong>
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

                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $colorClass }}">
                        {{ $team->color }}
                    </span>
                </div>
                <div class="mb-4"><strong>Liste des membres :</strong>
                    <ul>
                        @forelse ($team->users as $user)
                        <li>{{ $user->name }} ({{ $user->email }})</li>
                        @empty
                        <li>Aucun membre dans cette équipe.</li>
                        @endforelse
                    </ul>
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
        }
    }
</script>
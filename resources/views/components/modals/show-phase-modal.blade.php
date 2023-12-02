<!-- Show phase modal pour l'utilisateur {{ $phase->id }} -->
<div id="showphaseModal-{{ $phase->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center w-full h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Contenu du modal -->
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow p-5">
            <!-- Entête du modal -->
            <div class="flex justify-between items-start pb-4 mb-4 border-b dark:border-gray-600">
                <div class="flex items-center">
                    <h3 class="text-lg px-6 py-4  font-semibold text-gray-900 dark:text-white">
                        Détails de la phase
                    </h3>
                </div>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-md text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-close="showphaseModal-{{ $phase->id }}"
                    onclick="closeModal('showphaseModal-{{ $phase->id }}')">
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
                <div class="mb-4"><strong>ID :</strong> {{ $phase->id }}</div>
                <div class="mb-4"><strong>Nom :</strong> {{ $phase->name }}</div>
                <div class="mb-4"><strong>Évènement :</strong> {{ $phase->event->name }}</div>

                <div class="mb-4"><strong>Créé le :</strong> {{ $phase->created_at }}</div>
                <div class="mb-4"><strong>Mis à jour le :</strong> {{ $phase->updated_at }}</div>
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
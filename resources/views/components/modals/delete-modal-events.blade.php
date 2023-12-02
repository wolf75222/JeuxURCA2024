<!-- Modal de confirmation de suppression pour les équipes -->
@props(['modalId' => 'deleteTeamModal', 'message' => 'Êtes-vous sûr de vouloir supprimer cette/ces équipe(s) ?'])

<div id="{{ $modalId }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center w-full h-modal md:h-full">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--overlay-->
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50"></div>
        <!-- Contenu du modal -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Bouton fermer -->
            <button type="button"
                class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                onclick="closeModal('{{ $modalId }}')">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Fermer le modal</span>
            </button>
            <!-- Icône et texte -->
            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
            <p class="mb-4 text-gray-500 dark:text-gray-300 text-center">{{ $message }}</p>
            <!-- Boutons -->
            <div class="flex justify-center items-center space-x-4">
                <button data-modal-toggle="{{ $modalId }}" type="button"
                    class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                    onclick="closeModal('{{ $modalId }}')">
                    Non, annuler
                </button>
                <button type="button"
                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900"
                    onclick="confirmDeleteEvents()">
                    Oui, je suis sûr
                </button>
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
    function confirmDeleteEvents() {
        const selectedEvents = Array.from(document.querySelectorAll('input[name="selected_events[]"]:checked')).map(checkbox => checkbox.value);
        if (selectedEvents.length > 0) {
            sendPostRequest('{{ route('events.destroySelected') }}', selectedEvents);
        } else {
            alert('Veuillez sélectionner au moins un événement.');
        }
    }
</script>
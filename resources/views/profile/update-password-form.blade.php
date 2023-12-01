<x-sections.form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Mettre à jour le mot de passe') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Veillez à ce que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-forms.label for="current_password" value="{{ __('Mot de passe actuel') }}" />
            <x-forms.input id="current_password" type="password" class="mt-1 block w-full" wire:model="state.current_password" autocomplete="current-password" />
            <x-forms.input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-forms.label for="password" value="{{ __('Nouveau mot de passe') }}" />
            <x-forms.input id="password" type="password" class="mt-1 block w-full" wire:model="state.password" autocomplete="new-password" />
            <x-forms.input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-forms.label for="password_confirmation" value="{{ __('Confirmer le mot de passe') }}" />
            <x-forms.input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-forms.input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-modals.action-message class="me-3" on="saved">
            {{ __('Sauvegardé.') }}
        </x-modals.action-message>

        <x-buttons.button>
            {{ __('Sauvegarder') }}
        </x-buttons.button>
    </x-slot>
</x-sections.form-section>

<x-sections.form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informations sur le profil') }}
    </x-slot>

    <x-slot name="description">
            {{ __("Mettez à jour les informations de profil et l'adresse électronique de votre compte.") }}
        </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-forms.label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    @if ($this->user->profile_photo_path)
                    <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $this->user->image_path) }}" alt="{{ $this->user->name }} image">
                     @else
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-800 flex items-center justify-center">
                        <span class="text-gray-500 text-lg">{{ substr($this->user->name, 0, 1) }}</span>
                    </div>
                @endif
                    {{-- <img src="{{ $this->user->profile_photo_path }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover"> --}}
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-buttons.secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Sélectionner une nouvelle photo') }}
                </x-buttons.secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-buttons.secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Supprimer la photo') }}
                    </x-buttons.secondary-button>
                @endif

                <x-forms.input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-forms.label for="name" value="{{ __('Name') }}" />
            <x-forms.input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-forms.input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-forms.label for="email" value="{{ __('Email') }}" />
            <x-forms.input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-forms.input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2 dark:text-gray-400">
                    {{ __("Votre adresse électronique n'est pas vérifiée.") }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __("Cliquez ici pour renvoyer l'e-mail de vérification.") }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('Un nouveau lien de vérification a été envoyé à votre adresse électronique.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-modals.action-message class="me-3" on="saved">
            {{ __('Sauvegardé.') }}
        </x-modals.action-message>

        <x-buttons.button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Sauvegarder') }}
        </x-buttons.button>
    </x-slot>
</x-sections.form-section>

<x-sections.action-section>
    <x-slot name="title">
        {{ __("Sessions du navigateur") }}
    </x-slot>

    <x-slot name="description">
        {{ __("Gérez et déconnectez-vous de vos sessions actives sur d'autres navigateurs et appareils.") }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __("Si nécessaire, vous pouvez vous déconnecter de toutes vos autres sessions de navigateur sur tous vos appareils. Certaines de vos sessions récentes sont répertoriées ci-dessous ; cependant, cette liste peut ne pas être exhaustive. Si vous pensez que votre compte a été compromis, vous devriez également mettre à jour votre mot de passe.") }}
        </div>

        @if (count($this->sessions) > 0)
            <div class="mt-5 space-y-6">
                <!-- Autres sessions de navigateur -->
                @foreach ($this->sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            @endif
                        </div>

                        <div class="ms-3">
                            <div class="text-sm text-gray-600">
                                {{ $session->agent->platform() ? $session->agent->platform() : __("Inconnu") }} - {{ $session->agent->browser() ? $session->agent->browser() : __("Inconnu") }}
                            </div>

                            <div>
                                <div class="text-xs text-gray-500">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">{{ __("Cet appareil") }}</span>
                                    @else
                                        {{ __("Dernière activité") }} {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex items-center mt-5">
            <x-buttons.button wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __("Déconnecter les autres sessions de navigateur") }}
            </x-buttons.button>

            <x-modals.action-message class="ms-3" on="loggedOut">
                {{ __("Terminé.") }}
            </x-modals.action-message>
        </div>

        <!-- Modal de confirmation de déconnexion des autres appareils -->
        <x-modals.dialog-modal wire:model.live="confirmingLogout">
            <x-slot name="title">
                {{ __("Déconnecter les autres sessions de navigateur") }}
            </x-slot>

            <x-slot name="content">
                {{ __("Veuillez entrer votre mot de passe pour confirmer que vous souhaitez vous déconnecter de vos autres sessions de navigateur sur tous vos appareils.") }}

                <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-forms.input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Mot de passe') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-forms.input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-buttons.secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __("Annuler") }}
                </x-buttons.secondary-button>

                <x-buttons.button class="ms-3"
                            wire:click="logoutOtherBrowserSessions"
                            wire:loading.attr="disabled">
                    {{ __("Déconnecter les autres sessions de navigateur") }}
                </x-buttons.button>
            </x-slot>
        </x-modals.dialog-modal>
    </x-slot>
</x-sections.action-section>

<body class="bg-white dark:bg-gray-900">
    <header>
        @include('components.navigation')
    </header>

    <x-guest-layout>
        <section class="bg-white dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="{{ url('/') }}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="h-14 mr-3" src="{{ asset('img/jeuxdelurcaclrweb.png') }}" alt="logo">
                </a>
                <div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
                    <h2 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Confirmation du mot de passe
                    </h2>
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>

                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4 lg:space-y-5">
                        @csrf

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                required autocomplete="current-password" autofocus>
                        </div>

                        <div class="flex justify-end mt-4">
                            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                {{ __('Confirm') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </x-guest-layout>

    <x-footer :year="date('Y')" />
</body>

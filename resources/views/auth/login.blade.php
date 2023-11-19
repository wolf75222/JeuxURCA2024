<body class="bg-white dark:bg-gray-900">
    <header>
        @include('components.navigation')
    </header>

    <x-guest-layout>
        <section class="bg-white dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="{{ url('/') }}"
                    class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="h-14 mr-3" src="{{ asset('img/jeuxdelurcaclrweb.png') }}" alt="logo">
                </a>
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Connectez-vous à votre compte
                        </h1>

                        <x-validation-errors class="mb-4" />

                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-4 md:space-y-6">
                            @csrf

                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="name@example.com" required autofocus value="{{ old('email') }}">
                            </div>

                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de
                                    passe</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required autocomplete="current-password">
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <input id="remember_me" name="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                    <label for="remember_me" class="ml-3 text-sm text-gray-500 dark:text-gray-300">{{
                                        __('Se Souvenir de moi') }}</label>
                                </div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-sm font-medium text-primary-600 hover:underline dark:text-blue-500">{{
                                    __('Mot de passe oublié?') }}</a>
                                @endif
                            </div>
                            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">{{ __('Log in') }} </button>
                        </form>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Vous n'avez pas encore de compte? <a href="{{ route('register') }}"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">S'inscrire</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </x-guest-layout>

    <x-footer :year="date('Y')" />
</body>
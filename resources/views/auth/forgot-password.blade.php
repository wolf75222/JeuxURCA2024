{{-- resources/views/auth/forgot-password.blade.php --}}
<!-- Status : factorisation -->

@extends('layouts.guest', ['title' => 'Mot de passe oublié'])

@section('content')
        <section class="bg-white dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="{{ url('/') }}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="h-14 mr-3" src="{{ asset('img/jeuxdelurcaclrweb.png') }}" alt="logo">
                </a>
                <div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
                    <h2 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Réinitialisation du mot de passe
                    </h2>
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <x-forms.validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('password.email') }}" class="mt-4 space-y-4 lg:mt-5 md:space-y-5">
                        @csrf

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                required autofocus autocomplete="username" value="{{ old('email') }}" placeholder="exemple@domaine.com">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                {{ __('Lien de réinitialisation du mot de passe par e-mail') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
@endsection

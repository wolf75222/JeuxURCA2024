{{-- resources/views/auth/register.blade.php --}}
<!-- Status : factorisation -->

@extends('layouts.guest', ['title' => 'Inscription'])

@section('content')
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
                            Créez votre compte
                        </h1>

                        <x-forms.validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('register') }}" class="space-y-4 md:space-y-6">
                            @csrf

                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                <input type="text" name="name" id="name" placeholder="Votre nom complet"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required autofocus autocomplete="name" value="{{ old('name') }}">
                            </div>


                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                                <input type="email" name="email" id="email" placeholder="exemple@domaine.com"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required autocomplete="username" value="{{ old('email') }}">
                            </div>

                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de
                                    passe</label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required autocomplete="new-password">
                            </div>

                            <div>
                                <label for="password_confirmation" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmez le
                                    mot de passe</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required autocomplete="new-password">
                            </div>

                            <button type="submit"
                                class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">S'inscrire</button>
                        </form>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Vous avez déjà un compte? <a href="{{ route('login') }}"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Connectez-vous</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
@endsection
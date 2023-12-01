{{-- resources/views/components/navbar.blade.php --}}
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center
    justify-between mx-auto p-4"> <a href="#" class="flex items-center"> <img
                src="{{ asset('img/jeuxdelurcaclrweb.png') }}" class="h-14 mr-3" alt="UrcaGames Logo" /> <!--<span
        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Jeux de l'URCA 2024</span>-->
        </a>
        <div class="flex items-center md:order-2">
            <button id="theme-toggle" type="button" onclick="toggleTheme()"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 m-1">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
            <script>
                function toggleTheme() {
                    var theme = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
                    document.documentElement.classList.toggle('dark', theme === 'dark');

                    fetch('/theme/' + theme).catch(console.error);
                }

                document.addEventListener('DOMContentLoaded', (event) => {
                    const theme = '{{ Cookie::get('theme', 'light') }}';
                    if (theme === 'dark') {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                });
            </script>
            <button type="button" class="flex mr-3 text-sm bg-gray-10 rounded-full md:mr-0 focus:ring-4
focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false"
                data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                @auth
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />
                @endauth
                @else
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                @endif
            </button>

            <!-- Dropdown menu -->
            <div class=" rounded z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                id="user-dropdown">
                @auth
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email
                        }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    @role('admin')
                    <li>
                        <a href="{{ route('dashboard.dashboard') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5 text-blue-500  dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 12v5m5-9v9m5-5v5m5-9v9M1 7l5-6 5 6 5-6" />
                            </svg>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    @endrole
                    <li>
                        <a href="{{ route('profile.show') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5 text-blue-500  dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z" />
                            </svg>
                            <span>Profil</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('teams.show') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5 text-blue-500  dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                            </svg>
                            <span>Mon équipe</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pages/settings') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5 text-blue-500  dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25" />
                            </svg>
                            <span>Paramètres</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2.5 text-blue-500  dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                                </svg>
                                <span>Se déconnecter</span>
                            </a>
                        </form>
                    </li>
                </ul>
                @endauth
                @guest
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ route('login') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5 text-blue-500  dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 15">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3" />
                            </svg>
                            <span>Se connecter</span>
                        </a>
                    </li>
                    <!--                     <li>
                        <a href="{{ route('register') }}"
                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5 text-blue-500  dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3" />
                            </svg>
                            <span>S'inscrire</span>
                        </a>
                    </li> -->
                </ul>
                @endguest

            </div>
            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ url('/') }}"
                        class="block py-2 pl-3 pr-4 {{ Request::is('/') ? 'text-blue-500' : 'text-gray-900 dark:text-white' }} rounded md:hover:bg-transparent md:hover:text-blue-500 md:p-0  md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                        aria-current="page">Accueil</a>
                </li>
                <li>
                    <a href="{{ url('pages/classement') }}"
                        class="block py-2 pl-3 pr-4 {{ Request::is('pages/classement') ? 'text-blue-500' : 'text-gray-900 dark:text-white' }} rounded md:hover:bg-transparent md:hover:text-blue-500 md:p-0  md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Classement</a>
                </li>
                <li>
                    <a href="{{ url('pages/equipes') }}"
                        class="block py-2 pl-3 pr-4 {{ Request::is('pages/equipes') ? 'text-blue-500' : 'text-gray-900 dark:text-white' }} rounded md:hover:bg-transparent md:hover:text-blue-500 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Équipe</a>
                </li>
                <li>
                    <a href="{{ url('pages/sports') }}"
                        class="block py-2 pl-3 pr-4 {{ Request::is('pages/sports') ? 'text-blue-500 dark:text-blue-500' : 'text-gray-900 dark:text-white' }} rounded md:hover:bg-transparent md:hover:text-blue-500 md:p-0  md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Sport</a>
                </li>
                <li>
                    <a href="{{ url('pages/regles') }}"
                        class="block py-2 pl-3 pr-4 {{ Request::is('pages/regles') ? 'text-blue-500  dark:text-blue-500' : 'text-gray-900 dark:text-white' }} rounded md:hover:bg-transparent md:hover:text-blue-500 md:p-0  md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Règles</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
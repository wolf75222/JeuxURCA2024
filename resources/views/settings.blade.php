{{-- resources/views/home.blade.php --}}

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres - URCA Games 2024</title>
    <!-- Ajoutez ici vos liens vers les feuilles de style -->
    @vite(['resources/css/app.css','resources/js/app.js'])
    <!-- 
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script> -->
</head>

<body class="bg-white dark:bg-gray-900">
    <header>
        @include('components.navigation')
    </header>
    <main class="flex flex-col justify-center items-center p-4">
        <h1 class="mb-8 text-2xl font-extrabold text-gray-900 dark:text-white md:text-3xl lg:text-4xl">Paramètres</h1>
        
        <div class="card w-96 mb-4">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer" id="themeToggle" checked>
                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Dark Mode</span>
            </label>

            <script>
                const themeToggle = document.getElementById('themeToggle');
                const html = document.documentElement;

                function setTheme() {
                    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                        html.classList.add('dark');
                        themeToggle.checked = true;
                    } else {
                        html.classList.remove('dark');
                        themeToggle.checked = false;
                    }
                }

                themeToggle.addEventListener('change', function() {
                    if (this.checked) {
                        html.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        html.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }
                });

                setTheme();
            </script>
        </div>

        <div class="card w-96 mb-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center justify-center w-full px-4 py-2 text-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <svg class="w-4 h-4 me-2 text-gray-100 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                    </svg>
                    <span>Se déconnecter</span>
                </button>
            </form>
        </div>
    </main>







</main>

<x-footer :year="date('2024')" />

<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
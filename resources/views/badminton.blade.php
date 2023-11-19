{{-- resources/views/sports.blade.php --}}

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>Badminton - URCA Games 2024</title>
    <!-- Ajoutez ici vos liens vers les feuilles de
    style -->

    <script> // On page load or when changing themes, best to add inline in `head` to avoid FOUC if
        (localStorage.getItem('color - theme ') === ' dark ' || (!(' color - theme ' in localStorage) &&
            window.matchMedia('(prefers - color - scheme: dark) ').matches)) { document.documentElement.classList.add('dark'); }
    else { document.documentElement.classList.remove('dark ') } </script>

    <!-- animate.min.css by Daniel Eden (https://animate.style)
        is required for the animation of notifications and slide out. You can ignore this step if you already have this. -->
    <link href="{{ asset(' vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

    <script src="//unpkg.com/alpinejs" defer></script>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-white dark:bg-gray-900">
    <header>
        @include('components.navigation')

    </header>

    <main>

        <main>




            <?php
        $top = [
            [   'id' => 1,
                'Prénom' => 'Alice',
                'Nom' => 'Martin',
                'Équipe' => 'URCA',
                'Composante' => 'STAPS',
                'Date de naissance' => '12/05/2001',
                'Sexe' => 'Femme',
                'Points' => '1080',
            ],
            [   'id' => 2,
                'Prénom' => 'Lucas',
                'Nom' => 'Girard',
                'Équipe' => 'URCA',
                'Composante' => 'STAPS',
                'Date de naissance' => '23/09/2000',
                'Sexe' => 'Homme',
                'Points' => '550',
            ],
            [   'id' => 3,
                'Prénom' => 'Emma',
                'Nom' => 'Lefebvre',
                'Équipe' => 'URCA',
                'Composante' => 'STAPS',
                'Date de naissance' => '05/03/2002',
                'Sexe' => 'Femme',
                'Points' => '1300',
            ],
            [   'id' => 4,
                'Prénom' => 'Hugo',
                'Nom' => 'Dubois',
                'Équipe' => 'URCA',
                'Composante' => 'STAPS',
                'Date de naissance' => '17/11/2001',
                'Sexe' => 'Homme',
                'Points' => '100',
            ],
            [   'id' => 5,
                'Prénom' => 'Chloé',
                'Nom' => 'Rousseau',
                'Équipe' => 'URCA',
                'Composante' => 'STAPS',
                'Date de naissance' => '29/07/2000',
                'Sexe' => 'Femme',
                'Points' => '2080',
            ]
        ];
        ?>


            @php
            $rulesArray = [
            [
            'title' => 'Format du Tournoi',
            'description' => 'Équipes de 6 divisées en 3 doublettes jouant en relais. Première doublette joue jusqu’à 11
            points, la seconde jusqu’à 22, et la troisième à partir de 33. 36 équipes réparties en 12 poules de 3.',
            ],
            [
            'title' => 'Déroulement des Matches',
            'description' => 'Les premières de chaque poule têtes de série pour le tableau éliminatoire. Matchs de
            classement de 1 à 8 après quarts de finale.',
            ],
            [
            'title' => 'Classement et Points',
            'description' => 'Points attribués de 8 à 2 pour les équipes de 1 à 7. Les autres reçoivent 1 point plus un
            point bonus pour diversité/mixité.',
            ],
            [
            'title' => 'Règles Spécifiques',
            'description' => 'Consultez les règles détaillées du Badminton sur
            https://www.badminton-chantecler-bordeaux.org/badminton-regles-du-jeu
            .',
            ],
            ];
            @endphp

            <x-sport title="Badminton"
                description="Découvrez le dynamisme du badminton, un sport où la vitesse et la précision se rencontrent pour offrir un spectacle passionnant. Rejoignez-nous aux Jeux de l'URCA 2024."
                image="img/badminton.png" :rules="$rulesArray" :searchable="true" :striped="true" exclude_columns="id"
                :divider="true" :divided="true" :hover_effect="true" :has_shadow="false" :compact="false"
                search_placeholder="Rechercher un joueur.." :data="$top" />



        </main>


    </main>


    <x-footer :year="date('2024')" />

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
{{-- resources/views/sports.blade.php --}}

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>Sumo - URCA Games 2024</title>
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
            @php
            $rulesArray = [
            [
            'title' => 'Format du Tournoi',
            'description' => '6 joueurs par équipe, divisés en poids lourds, moyens, et légers. Chaque joueur dispute 10
            matchs. Les victoires apportent des points à l\'équipe.',
            ],
            [
            'title' => 'Règles du Combat',
            'description' => 'Les concurrents commencent par un salut et se placent dans un cercle. L\'objectif est de
            sortir l\'adversaire du cercle ou de le faire tomber, sans projections délibérées.',
            ],
            [
            'title' => 'Classement',
            'description' => 'Basé sur le total de points de l\'équipe. En cas d\'égalité, pas de critère supplémentaire
            pour départager.',
            ],
            ];
            @endphp




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


            <x-sport title="Sumo"
                description="Vivez l'intensité et la stratégie du sumo aux Jeux de l'URCA 2024. Un affrontement de force et de technique où chaque combat est un spectacle."
                image="img/sumo.png" :rules="$rulesArray" :searchable="true" :striped="true" exclude_columns="id"
                :divider="true" :divided="true" :hover_effect="true" :has_shadow="false" :compact="false"
                search_placeholder="Rechercher un athlète.." :data="$top" />
        </main>


    </main>

    <x-footer :year="date('2024')" />

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
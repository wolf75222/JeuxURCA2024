{{-- resources/views/sports.blade.php --}}

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>Basket 3x3 - URCA Games 2024</title>
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
            'description' => 'Tournoi en 3 poules de 4 équipes de 6 joueurs. Chaque équipe joue 3 matchs de 10 minutes.
            Points par match : victoire - 3, nul - 2, défaite - 1.',
            ],
            [
            'title' => 'Classement et Égalité',
            'description' => 'En cas d\'égalité de points, le goal average général, puis les buts/essais marqués
            départagent. En cas d\'égalité persistante, le goal average particulier et le nombre de joueurs bonus
            décident.',
            ],
            [
            'title' => 'Phases Finales',
            'description' => 'Les premières et deuxièmes de chaque poule, plus les deux meilleures troisièmes, vont aux
            quarts de finale. Prolongation de 5 minutes, puis mort subite en cas d\'égalité.',
            ],
            [
            'title' => 'Règles du Basket 3X3',
            'description' => '3 joueurs en jeu, 3 remplaçants. Règles du Basket 3X3 FFSU appliquées. Détails sur
            https://www.sport-u.com/uploads/2016/Cindy/BASKET/16-CFU_reglement_BB%203X3.pdf
            .',
            ],
            ];
            @endphp

            <x-sport title="Basket 3X3"
                description="Entrez dans l'arène du Basket 3X3 aux Jeux de l'URCA 2024, un tournoi rapide et stratégique où chaque mouvement compte. Un spectacle d'agilité et de coordination."
                image="img/basket.png" :rules="$rulesArray" :searchable="true" :striped="true" exclude_columns="id"
                :divider="true" :divided="true" :hover_effect="true" :has_shadow="false" :compact="false"
                search_placeholder="Rechercher un joueur.." :data="$top" />







        </main>


    </main>


    <x-footer :year="date('2024')" />

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
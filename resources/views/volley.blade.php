{{-- resources/views/sports.blade.php --}}

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>Volley - URCA Games 2024</title>
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
            'description' => '20 équipes réparties en 5 poules. Chaque équipe joue 3 matchs de 8 minutes dans sa poule.
            Points attribués par match : victoire - 3, nul - 2, défaite - 1.',
            ],
            [
            'title' => 'Brassage et Classement',
            'description' => 'Après les matchs, brassage basé sur les points. En cas d\'égalité, priorité au nombre de
            points marqués, puis au goal average particulier. Nouvelles poules formées pour un second brassage.',
            ],
            [
            'title' => 'Tableau Final',
            'description' => 'Chaque équipe entre dans le tableau final, avec des têtes de série basées sur le
            classement du dernier brassage. Progression des 16èmes jusqu’à la finale. Pas d\'égalité dans les tableaux
            finaux, un point décisif détermine le vainqueur.',
            ],
            [
            'title' => 'Règles du Volley',
            'description' => '6 joueurs par équipe, règles du Volleyball fédéral appliquées. Plus de détails sur
            https://clg-goussons-gif.ac-versailles.fr/IMG/pdf/reglement_simplifie_volley-ball.pdf
            . Finale et petite finale arbitrées, les autres en
            auto-arbitrage.',
            ],
            ];
            @endphp

            <x-sport title="Volley"
                description="Plongez dans l'univers compétitif du Volley aux Jeux de l'URCA 2024. Un jeu qui combine agilité et esprit d'équipe, chaque point joué est un spectacle en soi."
                image="img/volley.png" :rules="$rulesArray" :searchable="true" :striped="true" exclude_columns="id"
                :divider="true" :divided="true" :hover_effect="true" :has_shadow="false" :compact="false"
                search_placeholder="Rechercher un joueur.." :data="$top" />





        </main>


    </main>


    <x-footer :year="date('2024')" />

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
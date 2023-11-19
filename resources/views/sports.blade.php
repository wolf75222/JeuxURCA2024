{{-- resources/views/sports.blade.php --}}

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>Page d'accueil - URCA Games 2024</title>
    <!-- Ajoutez ici vos liens vers les feuilles de
    style -->

    <!-- <script> // On page load or when changing themes, best to add inline in `head` to avoid FOUC if
        (localStorage.getItem('color - theme ') === ' dark ' || (!(' color - theme ' in localStorage) &&
            window.matchMedia('(prefers - color - scheme: dark) ').matches)) { document.documentElement.classList.add('dark'); }
    else { document.documentElement.classList.remove('dark ') } </script> -->

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
        <div class="container mx-auto px-32 py-16">

            <div class="grid grid-cols-1 sm:grid-cols-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <x-card title="Handball"
                    description="Découvrez le dynamisme et l'excitation du handball lors des Jeux de l'URCA 2024. Un sport où agilité, force et esprit d'équipe se rencontrent."
                    image="img/handball.png" link="/handball" />

                <x-card title="Sumo"
                    description="Vivez l'intensité et la stratégie du sumo aux Jeux de l'URCA 2024. Un affrontement de force et de technique où chaque combat est un spectacle."
                    image="img/sumo.png" link="/sumo" />

                <x-card title="Touch Rugby"
                    description="Immergez-vous dans l'action et l'esprit d'équipe du touch rugby lors des Jeux de l'URCA 2024. Un sport où agilité, stratégie et rapidité se combinent pour offrir un spectacle captivant."
                    image="img/rudby.png" link="/TouchRugby" />

                <x-card title="Laser Run"
                    description="Vivez l'intensité du Laser Run à l'URCA 2024, où précision et rapidité se rencontrent dans une course contre la montre captivante."
                    image="img/lazer.png" link="/lazerRun" />

                <x-card title="Tournoi E-Sport"
                    description="Découvrez l'énergie électrisante du tournoi E-Sport aux Jeux de l'URCA 2024, où la stratégie et la rapidité se rencontrent pour des affrontements numériques épiques."
                    image="img/esport.png" link="#" />

                <x-card title="Futsal"
                    description="Vibrez au rythme endiablé du Futsal lors des Jeux de l'URCA 2024, où agilité et passion se rencontrent dans un duel haletant aux couleurs vibrantes, du bleu intense au rose éclatant."
                    image="img/futsal.png" link="/futsal" />

                <x-card title="Palets bretons"
                    description="Découvrez l'adresse et la stratégie des Palets bretons, où précision et tactique se rejoignent pour un jeu de lancer captivant aux Jeux de l'URCA 2024."
                    image="img/palet.png" link="/paletsBretons" />

                <x-card title="Badminton"
                    description="Rejoignez l'effervescence du badminton aux Jeux de l'URCA 2024, où chaque échange est une démonstration de rapidité et de finesse, captivant les spectateurs dans un affrontement stratégique."
                    image="img/badminton.png" link="/badminton" />

                <x-card title="Relais Crossfit"
                    description="Découvrez le défi de haute intensité du Crossfit aux Jeux de l'URCA. Les équipes repoussent leurs limites dans une démonstration de force, d'endurance et de stratégie, le tout dans une atmosphère d'énergie vibrante."
                    image="img/crossfit.png" link="/relaisCrossfit" />

                <x-card title="Volley"
                    description="Expérimentez la dynamique du volley à l'URCA 2024. C'est un spectacle d'agilité et de coordination où chaque échange est un défi captivant."
                    image="img/volley.png" link="/volley" />

                <x-card title="Relais marathon"
                    description="Relais marathon à l'URCA 2024 : une course d'endurance en équipe où chaque relais compte, sous les vivats du public."
                    image="img/marathon.png" link="/relaisMarathon" />

                <x-card title="Basket 3c3"
                    description="Plongez dans l'énergie du Basket 3c3 aux Jeux de l'URCA 2024, où s'entremêlent esprit d'équipe, stratégie rapide et coups d'éclat sous les projecteurs."
                    image="img/basket.png" link="/basket" />

                <x-card title="Relais en bloc d'escalade"
                    description="Découvrez l'engouement et l'adresse du relais en bloc d'escalade aux Jeux de l'URCA 2024, où coordination, force et esprit d'équipe s'élèvent vers les sommets de la compétition."
                    image="img/relais.png" link="/relais" />
            </div>
        </div>

        @php
        $rulesArray = [
        [
        'title' => 'Format du tournoi',
        'description' => '3 poules de 4 équipes, avec 6 joueurs par équipe. Chaque équipe affronte les autres de sa
        poule sur des matchs de 10 minutes.',
        ],
        [
        'title' => 'Système de points',
        'description' => 'Victoire : 3 points, Match nul : 2 points, Défaite : 1 point. Le classement est établi sur
        cette base.',
        ],
        [
        'title' => 'Critères de classement',
        'description' => 'En cas d’égalité de points, le goal average général puis le nombre de buts/essais marqués
        départagera les équipes.',
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

        <x-sport title="Handball"
            description="Découvrez le dynamisme et l'excitation du handball lors des Jeux de l'URCA 2024. Un sport où agilité, force et esprit d'équipe se rencontrent."
            image="img/handball.png" :rules="$rulesArray" :searchable="true" :striped="true" exclude_columns="id"
            :divider="true" :divided="true" :hover_effect="true" :has_shadow="false " :compact="false"
            search_placeholder="Rechercher un athlète.." :data="$top" />



    </main>

    <x-footer :year="date('2024')" />

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
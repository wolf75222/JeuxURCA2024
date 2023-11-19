{{-- resources/views/sports.blade.php --}}

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>Relais en Bloc d'Escalade - URCA Games 2024</title>
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
            'title' => 'Format de l’Épreuve',
            'description' => 'Les équipes effectuent une traversée aller-retour de mur en relais. Chaque membre de
            l’équipe de 6 doit compléter le parcours. Classement basé sur le temps total de l’équipe.',
            ],
            [
            'title' => 'Règlement de l’Escalade',
            'description' => 'Chaque grimpeur doit terminer son parcours avant de passer le relais. Si un grimpeur
            touche le sol pendant sa traversée, il doit recommencer depuis le début.',
            ],
            ];
            @endphp

            <x-sport title="Relais en bloc d'escalade"
                description="Participez au Relais en Bloc d'Escalade aux Jeux de l'URCA 2024, une compétition où adresse et cohésion d'équipe se conjuguent pour une expérience à couper le souffle."
                image="img/relais.png" :rules="$rulesArray" :searchable="true" :striped="true" exclude_columns="id"
                :divider="true" :divided="true" :hover_effect="true" :has_shadow="false" :compact="false"
                search_placeholder="Rechercher un grimpeur.." :data="$top" />







        </main>


    </main>


    <x-footer :year="date('2024')" />

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
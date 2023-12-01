{{-- resources/views/events/lazerRun.blade.php --}}

<!-- Status : table -->

@extends('layouts.app')

@section('content')



@php
$top = [
[ 'id' => 1,
'Prénom' => 'Alice',
'Nom' => 'Martin',
'Équipe' => 'URCA',
'Composante' => 'STAPS',
'Date de naissance' => '12/05/2001',
'Sexe' => 'Femme',
'Points' => '1080',
],
[ 'id' => 2,
'Prénom' => 'Lucas',
'Nom' => 'Girard',
'Équipe' => 'URCA',
'Composante' => 'STAPS',
'Date de naissance' => '23/09/2000',
'Sexe' => 'Homme',
'Points' => '550',
],
[ 'id' => 3,
'Prénom' => 'Emma',
'Nom' => 'Lefebvre',
'Équipe' => 'URCA',
'Composante' => 'STAPS',
'Date de naissance' => '05/03/2002',
'Sexe' => 'Femme',
'Points' => '1300',
],
[ 'id' => 4,
'Prénom' => 'Hugo',
'Nom' => 'Dubois',
'Équipe' => 'URCA',
'Composante' => 'STAPS',
'Date de naissance' => '17/11/2001',
'Sexe' => 'Homme',
'Points' => '100',
],
[ 'id' => 5,
'Prénom' => 'Chloé',
'Nom' => 'Rousseau',
'Équipe' => 'URCA',
'Composante' => 'STAPS',
'Date de naissance' => '29/07/2000',
'Sexe' => 'Femme',
'Points' => '2080',
]
];
@endphp


@php
$rulesArray = [
[
'title' => 'Format de la Compétition',
'description' => 'Relais d’équipes de 6, chaque participant effectuant 3 tours de circuit. Le classement est
basé sur l’ordre d’arrivée après que tous les membres aient terminé leurs parcours.',
],
[
'title' => 'Règles de l’Épreuve',
'description' => 'Chaque concurrent doit réaliser trois tours, en touchant les cibles avec un pistolet
laser. Chaque cible manquée entraîne un tour de pénalité. Le relais passe au membre suivant après les tours
et pénalités.',
],
[
'title' => 'Fin de l’Épreuve',
'description' => 'L’épreuve se termine lorsque les six membres de l’équipe ont complété leur relais.',
],
];
@endphp

<x-UI.sport title="Laser Run"
    description="Découvrez le Laser Run, un mélange exaltant de précision et d'endurance. Relevez le défi du parcours et de la visée laser dans cette course palpitante des Jeux de l'URCA 2024."
    image="{{ asset('img/lazer.png') }}" :rules="$rulesArray" :data="$top" />

@endsection
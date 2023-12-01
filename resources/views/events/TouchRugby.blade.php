{{-- resources/views/events/TouchRugby.blade.php --}}

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
?>
@endphp

@php
$rulesArray = [
[
'title' => 'Format du Tournoi',
'description' => 'Tournoi en 3 poules de 4 équipes, chaque équipe jouant 3 matchs de poule de 10 minutes.
Les équipes sont classées par points : 3 pour une victoire, 2 pour un nul, 1 pour une défaite.',
],
[
'title' => 'Classement et Égalité',
'description' => 'Le goal average général départage les égalités de points, suivi par le nombre de
buts/essais. En cas de parité, le goal average particulier et le nombre de joueurs bonus décident du
classement.',
],
[
'title' => 'Phases Finales',
'description' => 'Les premières et deuxièmes de chaque poule, plus les deux meilleures troisièmes, accèdent
aux quarts de finale. En cas d\'égalité, prolongation de 5 minutes, puis mort subite si nécessaire.',
],
[
'title' => 'Composition des Équipes',
'description' => '4 joueurs en jeu et 2 remplaçants. Application des règles du Touch rugby FIT, avec
expulsions temporaires réduites à 1 minute.',
],
[
'title' => 'Classement Final',
'description' => 'Classement par médailles et points, avec des points bonus pour diversité/mixité. Les
équipes de 8 à 12 reçoivent 1 point plus leurs points bonus.',
],
];
@endphp


<x-UI.sport title="Touch Rugby"
    description="Découvrez le touch rugby, un sport qui combine agilité, stratégie et rapidité. Vivez des moments intenses lors des Jeux de l'URCA 2024."
    image="{{ asset('img/rudby.png') }}" :rules="$rulesArray" :data="$top" />

@endsection
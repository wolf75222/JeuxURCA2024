{{-- resources/views/events/sumo.blade.php --}}

<!-- Status : table -->

@extends('layouts.app')

@section('content')

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


<x-UI.sport title="Sumo"
    description="Vivez l'intensité et la stratégie du sumo aux Jeux de l'URCA 2024. Un affrontement de force et de technique où chaque combat est un spectacle."
    image="{{ asset('img/sumo.png') }}" :rules="$rulesArray" :data="$top" />

@endsection
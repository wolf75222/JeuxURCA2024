{{-- resources/views/events/paletsBretons.blade.php --}}

<!-- Status : table -->

@extends('layouts.app', ['title' => 'Palets bretons'])

@section('content')

@props(['event', 'matches'])


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
'title' => 'Format du Tournoi',
'description' => 'Chaque équipe de 6 joueurs joue contre les 5 autres équipes. Formation de 3 doublettes par
équipe, alternant après chaque trois mènes. La main initiale déterminée par une question de culture générale
sur les JO.',
],
[
'title' => 'Déroulement du Jeu',
'description' => 'Parties jouées en une manche de 12 points. Les équipes se rencontrent en format
round-robin (toutes contre toutes).',
],
[
'title' => 'Classement',
'description' => 'Classement basé sur le nombre de victoires après toutes les rencontres. En cas d\'égalité,
pas de départage supplémentaire.',
],
[
'title' => 'Règles Spécifiques',
'description' => 'Consultez les règles détaillées du jeu de Palets bretons sur palet-bzh.fr/regles .',
],
];
@endphp

<x-UI.sport title="Palets bretons"
    description="Participez à l'élégance tactique des Palets bretons aux Jeux de l'URCA 2024. Un défi d'adresse et de stratégie dans un cadre compétitif captivant."
    image="{{ asset('img/palet.png') }}" :rules="$rulesArray" :data="$top" />

    <x-tables.table-classement-event :event="$event" :matches="$matches" />

@endsection
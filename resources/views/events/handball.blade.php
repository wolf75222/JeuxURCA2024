{{-- resources/views/events/handball.blade.php --}}

<!-- Status : table -->

@extends('layouts.app')

@section('content')

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
        @endphp

        <x-UI.sport title="Handball"
            description="Découvrez le dynamisme et l'excitation du handball lors des Jeux de l'URCA 2024. Un sport où agilité, force et esprit d'équipe se rencontrent."
            image="{{ asset('img/handball.png') }}" :rules="$rulesArray" :data="$top" />

@endsection
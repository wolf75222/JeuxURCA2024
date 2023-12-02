{{-- resources/views/events/relais.blade.php --}}

<!-- Status : table -->

@extends('layouts.app')

@section('content')


@props(['event', 'matches'])

@php
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

            <x-UI.sport title="Relais en bloc d'escalade"
                description="Participez au Relais en Bloc d'Escalade aux Jeux de l'URCA 2024, une compétition où adresse et cohésion d'équipe se conjuguent pour une expérience à couper le souffle."
                image="{{ asset('img/relais.png') }}" :rules="$rulesArray" :data="$top" />

                <x-tables.table-classement-event :event="$event" :matches="$matches" />




@endsection
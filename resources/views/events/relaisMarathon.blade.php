{{-- resources/views/events/relaisMarathon.blade.php --}}

<!-- Status : table -->

@extends('layouts.app')

@section('content')



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
            'title' => 'Format du Relais Marathon',
            'description' => 'Équipes de 6 courent un marathon (42,195 km) en relais sur un parcours en aller-retours.
            Classement basé sur l\'ordre d\'arrivée après la distance complète.',
            ],
            [
            'title' => 'Déroulement du Relais',
            'description' => 'Chaque membre de l\'équipe peut courir le nombre de relais souhaité. Seule la distance
            parcourue par le relayeur avec le témoin est comptabilisée. Relais dans une zone délimitée et virage
            derrière des plots pour valider une longueur.',
            ],
            ];
            @endphp

            <x-UI.sport title="Relais marathon"
                description="Participez au Relais Marathon des Jeux de l'URCA 2024, une épreuve d'endurance où la cohésion d'équipe et la stratégie sont clés. Une course passionnante où chaque relais contribue au succès."
                image="{{ asset('img/marathon.png') }}" :rules="$rulesArray" :data="$top" />

@endsection




 
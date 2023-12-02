{{-- resources/views/events/futsal.blade.php --}}

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
            'title' => 'Structure du Tournoi',
            'description' => 'Tournoi en 3 poules de 4 équipes, chaque équipe jouant 3 matchs de 10 minutes. Points
            attribués par match : victoire - 3, nul - 2, défaite - 1.',
            ],
            [
            'title' => 'Critères de Classement',
            'description' => 'Le classement en cas d\'égalité de points se base sur le goal average général, puis les
            buts/essais marqués. En cas d\'égalité persistante, le goal average particulier et le nombre de joueurs
            bonus sont pris en compte.',
            ],
            [
            'title' => 'Phases Éliminatoires',
            'description' => 'Les premières et deuxièmes de chaque poule, plus les deux meilleures troisièmes, vont aux
            quarts de finale. Prolongation de 5 minutes, puis mort subite si égalité.',
            ],
            [
            'title' => 'Règlement du Futsal',
            'description' => '5 joueurs par équipe (4 joueurs de champ + 1 gardien) avec remplacements illimités. Pas de
            tacles, pas de hors-jeu, remises en jeu au pied. Expulsions temporaires limitées à 1 minute.',
            ],
            [
            'title' => 'Classement Final',
            'description' => 'Classement par médailles et points, avec points bonus pour diversité/mixité. Équipes de 8
            à 12 reçoivent 1 point plus bonus pour équité entre activités.',
            ],
            ];
            @endphp

            <x-UI.sport title="Futsal"
                description="Explorez la dynamique rapide du Futsal aux Jeux de l'URCA 2024. Un jeu d'agilité et de stratégie où chaque match est un spectacle passionnant."
                image="{{ asset('img/futsal.png') }}" :rules="$rulesArray" :data="$top" />

                <x-tables.table-classement-event :event="$event" :matches="$matches" />

@endsection
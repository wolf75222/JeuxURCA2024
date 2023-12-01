{{-- resources/views/events/relaisCrossfit.blade.php --}}

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
'title' => 'Format de l’Épreuve',
'description' => 'Équipes de 6 en relais, chaque membre effectuant 3 tours de circuit. Le classement se base
sur l’ordre d’arrivée après que tous les membres aient terminé leurs parcours.',
],
[
'title' => 'Déroulement du Relais',
'description' => 'Chaque participant complète trois tours du circuit avant de passer le relais au membre
suivant. L’épreuve se termine une fois tous les membres ayant effectué leur relais.',
],
];
@endphp

<x-UI.sport title="Relais Crossfit"
    description="Plongez dans l'univers intense du Relais Crossfit lors des Jeux de l'URCA 2024. Un événement qui met à l'épreuve force et endurance, dans un esprit d'équipe stimulant."
    image="{{ asset('img/crossfit.png') }}" :rules="$rulesArray" :data="$top" />



@endsection
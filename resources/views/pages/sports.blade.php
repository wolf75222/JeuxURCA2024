{{-- resources/views/pages/sports.blade.php --}}

<!-- Status : clean -->

@extends('layouts.app', ['title' => 'Sports'])

@section('content')

<div class="container mx-auto px-32 py-16">

    <div class="grid grid-cols-1 sm:grid-cols-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <x-UI.card title="Handball"
            description="Découvrez le dynamisme et l'excitation du handball lors des Jeux de l'URCA 2024. Un sport où agilité, force et esprit d'équipe se rencontrent."
            image="img/handball.png" link="{{ url('/events/handball') }}" />

        <x-UI.card title="Sumo"
            description="Vivez l'intensité et la stratégie du sumo aux Jeux de l'URCA 2024. Un affrontement de force et de technique où chaque combat est un spectacle."
            image="img/sumo.png" link="{{ url('/events/sumo') }}" />

        <x-UI.card title="Touch Rugby"
            description="Immergez-vous dans l'action et l'esprit d'équipe du touch rugby lors des Jeux de l'URCA 2024. Un sport où agilité, stratégie et rapidité se combinent pour offrir un spectacle captivant."
            image="img/rudby.png" link="{{ url('/events/TouchRugby') }}" />

        <x-UI.card title="Laser Run"
            description="Vivez l'intensité du Laser Run à l'URCA 2024, où précision et rapidité se rencontrent dans une course contre la montre captivante."
            image="img/lazer.png" link="{{ url('/events/lazerRun') }}" />

        <x-UI.card title="Futsal"
            description="Vibrez au rythme endiablé du Futsal lors des Jeux de l'URCA 2024, où agilité et passion se rencontrent dans un duel haletant aux couleurs vibrantes, du bleu intense au rose éclatant."
            image="img/futsal.png" link="{{ url('/events/futsal') }}" />

        <x-UI.card title="Palets bretons"
            description="Découvrez l'adresse et la stratégie des Palets bretons, où précision et tactique se rejoignent pour un jeu de lancer captivant aux Jeux de l'URCA 2024."
            image="img/palet.png" link="{{ url('/events/paletsBretons') }}" />

        <x-UI.card title="Badminton"
            description="Rejoignez l'effervescence du badminton aux Jeux de l'URCA 2024, où chaque échange est une démonstration de rapidité et de finesse, captivant les spectateurs dans un affrontement stratégique."
            image="img/badminton.png" link="{{ url('/events/badminton') }}" />

        <x-UI.card title="Relais Crossfit"
            description="Découvrez le défi de haute intensité du Crossfit aux Jeux de l'URCA. Les équipes repoussent leurs limites dans une démonstration de force, d'endurance et de stratégie, le tout dans une atmosphère d'énergie vibrante."
            image="img/crossfit.png" link="{{ url('/events/relaisCrossfit') }}" />

        <x-UI.card title="Volley"
            description="Expérimentez la dynamique du volley à l'URCA 2024. C'est un spectacle d'agilité et de coordination où chaque échange est un défi captivant."
            image="img/volley.png" link="{{ url('/events/volley') }}" />

        <x-UI.card title="Relais marathon"
            description="Relais marathon à l'URCA 2024 : une course d'endurance en équipe où chaque relais compte, sous les vivats du public."
            image="img/marathon.png" link="{{ url('/events/relaisMarathon') }}" />

        <x-UI.card title="Basket 3c3"
            description="Plongez dans l'énergie du Basket 3c3 aux Jeux de l'URCA 2024, où s'entremêlent esprit d'équipe, stratégie rapide et coups d'éclat sous les projecteurs."
            image="img/basket.png" link="{{ url('/events/basket') }}" />

        <x-UI.card title="Relais en bloc d'escalade"
            description="Découvrez l'engouement et l'adresse du relais en bloc d'escalade aux Jeux de l'URCA 2024, où coordination, force et esprit d'équipe s'élèvent vers les sommets de la compétition."
            image="img/relais.png" link="{{ url('/events/relais') }}" />
    </div>
</div>
@endsection
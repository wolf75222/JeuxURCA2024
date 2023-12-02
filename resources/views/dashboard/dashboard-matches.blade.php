{{-- resources/views/dashboard/dashboard-matches.blade.php --}}

@extends('layouts.dashboard' , ['title' => 'Tableau de bord'])

@section('content')


<main class="p-4 md:ml-64 h-auto pt-20">
    <x-tables.table-dashboard-matches :groups="$groups" :events="$events" :phases="$phases" :matches="$matches" :teams="$teams"/>
</main>

@endsection
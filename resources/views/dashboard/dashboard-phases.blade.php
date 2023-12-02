{{-- resources/views/dashboard/dashboard-phase.blade.php --}}

@extends('layouts.dashboard' , ['title' => 'Tableau de bord'])

@section('content')


      <main class="p-4 md:ml-64 h-auto pt-20">
        <x-tables.table-dashboard-phase :event="$events" :phases="$phases"  />

      </main>
  
@endsection
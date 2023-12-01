{{-- resources/views/dashboard/dashboard-users.blade.php --}}

@extends('layouts.dashboard' , ['title' => 'Tableau de bord'])

@section('content')


      <main class="p-4 md:ml-64 h-auto pt-20">
        <x-tables.table-dashboard-users :users="$users"  :roles="$roles" :teams="$teams" />

      </main>
  
@endsection
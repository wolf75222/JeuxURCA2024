{{-- resources/views/dashboard/dashboard.blade.php --}}

@extends('layouts.dashboard' , ['title' => 'Tableau de bord'])

@section('content')


      <main class="p-4 md:ml-64 h-auto pt-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
          <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
            @php
            $userIcon = '
            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="currentColor" viewBox="0 0 20 18">
              <path
                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
            </svg>
            ';
            @endphp

            <x-UI.card-dashboard title="Nombre d'utilisateurs" description="Nombre total d'utilisateurs"
              data="{{ $userCount }}" :icon="$userIcon" />
          </div>
          <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64">
            @php
            $adminIcon = '<svg class="w-6 h-6 text-blue-600 dark:text-blue-400" aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
              <path
                d="M7.324 9.917A2.479 2.479 0 0 1 7.99 7.7l.71-.71a2.484 2.484 0 0 1 2.222-.688 4.538 4.538 0 1 0-3.6 3.615h.002ZM7.99 18.3a2.5 2.5 0 0 1-.6-2.564A2.5 2.5 0 0 1 6 13.5v-1c.005-.544.19-1.072.526-1.5H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h7.687l-.697-.7ZM19.5 12h-1.12a4.441 4.441 0 0 0-.579-1.387l.8-.795a.5.5 0 0 0 0-.707l-.707-.707a.5.5 0 0 0-.707 0l-.795.8A4.443 4.443 0 0 0 15 8.62V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.12c-.492.113-.96.309-1.387.579l-.795-.795a.5.5 0 0 0-.707 0l-.707.707a.5.5 0 0 0 0 .707l.8.8c-.272.424-.47.891-.584 1.382H8.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1.12c.113.492.309.96.579 1.387l-.795.795a.5.5 0 0 0 0 .707l.707.707a.5.5 0 0 0 .707 0l.8-.8c.424.272.892.47 1.382.584v1.12a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1.12c.492-.113.96-.309 1.387-.579l.795.8a.5.5 0 0 0 .707 0l.707-.707a.5.5 0 0 0 0-.707l-.8-.795c.273-.427.47-.898.584-1.392h1.12a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5ZM14 15.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z" />
            </svg>';
            @endphp
            <x-UI.card-dashboard title="Administrateurs" description="Nombre total d'administrateurs"
              data="{{ $adminCount }}" :icon="$adminIcon" />
          </div>
          <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64">
            @php
            $organizerIcon = '<svg class="w-6 h-6 text-blue-600 dark:text-blue-400" aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
              <path
                d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z" />
            </svg>';
            @endphp
            <x-UI.card-dashboard title="Organisateurs" description="Nombre total d'organisateurs"
              data="{{ $organizerCount }}" :icon="$organizerIcon" />
          </div>
          <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64">
            @php
            $teamLeaderIcon = '<svg class="w-6 h-6 text-blue-600 dark:text-blue-400" aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
              <path
                d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
              <path
                d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
            </svg>';
            @endphp
            <x-UI.card-dashboard title="Chefs d'équipe" description="Nombre total de chefs d'équipe"
              data="{{ $teamLeaderCount }}" :icon="$teamLeaderIcon" />
          </div>
        </div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4">
          <!-- // derniers utilisateurs inscrit create_at --->
          <x-tables.table-dashboard :users="$lastUsers" :roles="$roles" :teams="$teams" />

        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
          <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">

            <x-UI.donut-chart chartId="roles-distribution-chart" title="Répartition des rôles"
              :series="[$adminCount, $organizerCount, $teamLeaderCount, $userCount - ($adminCount + $organizerCount + $teamLeaderCount)]"
              :labels="['Admin', 'Organisateur', 'Leader d’équipe', 'Utilisateurs']"
              :colors="['#00E396', '#FFA500', '#775DD0', '#008FFB']" />
          </div>
          <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
          <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
          <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        </div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
        <div class="grid grid-cols-2 gap-4">
          <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
          <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
          <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
          <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        </div>
      </main>
    </div>

  </main>
@endsection
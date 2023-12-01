{{-- resources/views/components/card-dashboard.blade.php --}}

@props(['title', 'description', 'data', 'icon'])

<!-- Card pour le nombre d'utilisateurs -->
<div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 w-full h-32 md:h-64 p-6 flex flex-col justify-between">
    <div class="flex items-center">
        <!-- Icône SVG -->
        @if($icon)
            <div class="mr-3 text-blue-600 dark:text-blue-400">
                {!! $icon !!}
            </div>
        @endif

        <div>
            <h5 class="text-xl md:text-2xl lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $title }}
            </h5>
            <p class="text-sm md:text-base lg:text-base font-normal text-gray-700 dark:text-gray-400">
                {{ $description }}
            </p>
        </div>
    </div>
    <div class="text-3xl md:text-4xl lg:text-5xl font-semibold text-blue-600 dark:text-blue-400">
        {{ $data }}
    </div>
</div>

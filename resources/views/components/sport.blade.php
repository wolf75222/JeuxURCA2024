{{-- resources/views/components/sport.blade.php --}}
@props(['title', 'description', 'image', 'rules', 'searchable', 'striped', 'exclude_columns', 'divider', 'divided',
'hover_effect', 'has_shadow', 'compact', 'search_placeholder', 'data'])

<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl mx-auto px-32 py-16 lg:grid-cols-2 gap-10">
        <div class="place-self-center">
            <h1 class="text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">{{
                $title }}</h1>
            <p class="font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">{{ $description }}</p>
        </div>
        <div class="w-full lg:mt-0">
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-auto rounded-xl shadow-xl object-cover">
        </div>
    </div>
</section>

<section class="bg-white dark:bg-gray-900">
    <div class="py-16 px-32 mx-auto max-w-screen-xl">
        <div class="max-w-screen-lg">
            <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">Le Programme des Épreuves
            </h2>
            <p class="mb-4 font-light text-gray-500 dark:text-gray-400"> Afin d'obtenir toutes les informations
                nécessaires
                sur les différentes épreuves, y compris les horaires précis et les détails de chaque compétition, nous
                vous
                invitons à visiter la section dédiée au programme sur notre page d'accueil. Vous y trouverez un aperçu
                complet
                et mis à jour des événements à venir, vous permettant ainsi de planifier votre participation ou votre
                soutien à
                vos équipes et athlètes favoris.
            </p>
            <a href="{{ url('/') }}#accordionPrograme" class="inline-flex items-center font-medium text-blue-600
        hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-700">
                Programme des épreuves
                <svg class="ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
<section class="bg-white dark:bg-gray-900">
    <div class="py-16 mx-auto max-w-screen-xl px-32">
        <div class="max-w-screen-md mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Les règles du jeu
            </h2>
            <p class="text-gray-500 sm:text-xl dark:text-gray-400">Comprendre les règles est essentiel pour une
                compétition équitable et excitante.</p>
        </div>
        <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
            @foreach($rules as $rule)
            <div>
                <div
                    class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                    {!! $rule['icon'] ?? '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13v3m3-3v3M7 7H4m3-3H4m3 6H4m6 3v3m8-3H7V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v17h17a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1Z" />
                    </svg>' !!}
                </div>
                <h3 class="mb-2 text-xl font-bold dark:text-white">{{ $rule['title'] }}</h3>
                <p class="text-gray-500 dark:text-gray-400">{{ $rule['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="bg-white dark:bg-gray-900">
    <div class="py-16 px-32 mx-auto max-w-screen-xl">
        <x-bladewind::card title="{{ $title }}" has_shadow="{{ $has_shadow }}" reduce_padding="{{ $compact }}">
            
            <x-bladewind::table 
                searchable="{{ $searchable }}" 
                striped="{{ $striped }}" 
                exclude_columns="{{ $exclude_columns }}"
                divider="{{ $divider }}" 
                divided="{{ $divided }}" 
                hover_effect="{{ $hover_effect }}" 
                has_shadow="{{ $has_shadow }}" 
                compact="{{ $compact }}"
                search_placeholder="{{ $search_placeholder }}" 
                :data="$data" 
            />
        </x-bladewind::card>
    </div>
</section>


{{-- resources/views/components/UI/card.blade.php --}}

<!-- Status : clean -->

@props(['title', 'description', 'image', 'link'])

<div class="relative max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 hover:shadow-lg transition-shadow duration-300 ease-in-out hover-reflection-effect">
    <a href="{{ $link }}">
        <img class="rounded-t-lg object-cover w-full h-48 md:h-64 transition duration-300 ease-in-out" src="{{ asset($image) }}" alt="{{ $title }}" />
    </a>
    <div class="p-5">
        <a href="{{ $link }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $description }}</p>
        <a href="{{ $link }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            En savoir plus
            <svg class="ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>  
</div>

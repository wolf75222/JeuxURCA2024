{{-- resources/views/components/pagination.blade.php --}}


@if ($paginator->hasPages())
<nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
        Affichage de
        <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->firstItem() }}-{{
            $paginator->lastItem() }}</span>
        sur
        <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total() }}</span>
    </span>
    <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
        @if ($paginator->onFirstPage())
        <li>
            <a href="#"
                class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
        </li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}"
                class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
        </li>
        @endif

        @foreach ($elements as $element)
        @if (is_string($element))
        <li>
            <span
                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{
                $element }}</span>
        </li>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li>
            <a href="#" aria-current="page"
                class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{
                $page }}</a>
        </li>
        @else
        <li>
            <a href="{{ $url }}"
                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{
                $page }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}"
                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
        </li>
        @else
        <li>
            <a href="#"
                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
        </li>
        @endif
    </ul>
</nav>
@endif
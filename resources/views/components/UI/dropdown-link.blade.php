<a {{ $attributes->merge([
    'class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700
    hover:bg-gray-100 focus:outline-none focus:bg-gray-100
    transition duration-150 ease-in-out
    dark:text-gray-200 dark:hover:bg-gray-700 dark:focus:bg-gray-700'
    ]) }}>
    {{ $slot }}
</a>
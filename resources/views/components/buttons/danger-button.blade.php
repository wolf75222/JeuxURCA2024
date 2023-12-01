<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-900 dark:hover:bg-gray-700 dark:active:bg-gray-900 dark:focus:ring-2 dark:focus:ring-gray-700 dark:focus:ring-offset-2']) }}>
    {{ $slot }}
</button>

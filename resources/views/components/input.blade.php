@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm
dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400'
]) !!}>
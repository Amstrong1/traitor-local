@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'pl-4 dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-full shadow-sm block mt-1 w-full py-2 border-0',
    'style' => 'background-color: #bbaf7b',
]) !!}>

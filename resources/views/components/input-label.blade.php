@props(['value'])

<label {{ $attributes->merge(['class' => 'ml-4 block font-bold text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>

@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 pt-1  bg-green-800 bg-opacity-20 border-b-2 border-green-400  font-medium leading-5 text-gray-900 '
            : 'inline-flex items-center px-3 pt-1   font-medium leading-5 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 pt-1  bg-zam-green bg-opacity-20 border-b-2 border-zam-light  font-medium leading-5 text-zam-light '
            : 'inline-flex items-center px-3 pt-1   font-medium leading-5 border-b-2 border-transparent text-zam-gray hover:text-zan-light hover:border-gray-300 focus:outline-none focus:text-zam-white focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

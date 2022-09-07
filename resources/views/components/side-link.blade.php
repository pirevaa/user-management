@props(['active'])

@php
$classes = ($active ?? false)
? 'flex items-center px-4 mt-3 py-2 text-gray-700 rounded-md bg-zinc-800 text-gray-200'
: 'flex items-center px-4 py-2 mt-3 transition-colors duration-300 transform rounded-md text-gray-400 hover:bg-zinc-700
hover:text-gray-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
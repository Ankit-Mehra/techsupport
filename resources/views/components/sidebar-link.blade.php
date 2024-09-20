@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-2 text-gray-800 bg-gray-100'
            : 'flex items-center px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

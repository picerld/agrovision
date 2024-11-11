@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-2 text-gray-700 rounded-lg bg-gray-200'
            : 'flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

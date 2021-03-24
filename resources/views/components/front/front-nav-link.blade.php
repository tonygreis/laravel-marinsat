@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-4 py-2 text-normal font-semibold bg-transparent rounded-lg bg-main-light'
            : 'px-4 py-2 text-normal font-semibold bg-transparent rounded-lg hover:bg-main-light';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
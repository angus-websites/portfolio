@props(['active','href'])

@php
$classes = ($active ?? false)
            ? 'px-3 py-2 text-md font-medium rounded-md text-primary-focus'
            : 'px-3 py-2 text-md font-medium rounded-md text-gray-500 hover:bg-blue-100 hover:text-blue-600';
$hrefStr = ($active ?? false)
            ? ""
            : "href=$href";
@endphp

<a {{$hrefStr}} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

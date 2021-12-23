@props(['active','href'])

@php
$classes = ($active ?? false)
            ? 'active'
            : '';
$hrefStr = ($active ?? false)
            ? ""
            : "href=$href";
@endphp
<li>
  <a {{$hrefStr}} {{ $attributes->merge(['class' => $classes]) }} >{{ $slot }}</a>
</li>


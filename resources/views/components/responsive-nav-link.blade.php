@props(['active','href'])

@php
$classes = ($active ?? false)
            ? 'active'
            : '';
@endphp
<li>
  <a href="{{$href}}" {{ $attributes->merge(['class' => $classes]) }} >{{ $slot }}</a>
</li>


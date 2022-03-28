@props(['disabled' => false, 'error' => "", 'showgreen' => false])

@php

$hasError = $errors->has($error);

$classes = ($hasError ?? false)
            ? "textarea textarea-error"
            : ($showgreen ?? false ? "textarea textarea-success" : "textarea");
@endphp

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}>
  {{$slot}}
</textarea>
@error($error)
  <label class="label">
      <span class="label-text-alt">{{ $message }}</span>
  </label>
@enderror
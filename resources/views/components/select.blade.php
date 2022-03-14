@props(['disabled' => false, 'error' => "", 'showgreen' => false])

@php

$hasError = $errors->has($error);

$classes = ($hasError ?? false)
            ? "select select-error"
            : ($showgreen ?? false ? "select select-success" : "select");
@endphp

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}>
  {{$slot}}
</select>
@error($error)
  <label class="label">
      <span class="label-text-alt">{{ $message }}</span>
  </label>
@enderror
@props(['disabled' => false, 'error' => "", 'showgreen' => false])

@php

$hasError = $errors->has($error);

$classes = ($hasError ?? false)
            ? "input input-error"
            : ($showgreen ?? false ? "input input-success" : "input");
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}>
@error($error)
  <label class="label">
      <span class="label-text-alt">{{ $message }}</span>
  </label>
@enderror
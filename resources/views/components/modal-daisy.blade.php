@props(['id'])

@php
$id = $id ?? md5($attributes->wire('model'));
@endphp

<input {{$attributes}} type="checkbox" id="{{$id}}" class="modal-toggle">
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-lg">{{ $title }}</h3>

        <div>
            {{ $content }}
        </div>

        <div class="modal-action">
            {{ $footer }}  
        </div>
    </div>
</div>
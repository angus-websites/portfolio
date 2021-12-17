@props(['colour','textcolour'])


<div class="badge border-0" style="background-color: {{ isset($colour) ? $colour : "#000000" }}; color: {{ isset($textcolour) ? $textcolour : "#FFFFFF" }} ;">
  {{ $slot }}
</div> 

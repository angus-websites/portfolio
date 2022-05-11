@section('title', 'Projects')
@section('description', 'View my projects on my portfolio site')

<x-app-layout>
  <x-page-container>
    <x-page-title title="My projects" subtitle="Here you will find the projects I am currently working on, as well as the ones I have previously worked on" />

    <!--Projects-->
    <div class="pt-24">
      @livewire("projects.index")
    </div>
  
  </x-page-container>
 
</x-app-layout>

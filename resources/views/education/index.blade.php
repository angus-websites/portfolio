@section('title', 'Education')

<x-app-layout>
  <x-page-container>
    <x-page-title title="Education" subtitle="Here you can add, remove and modify education history" />

    <!--Education-->
    <div class="mt-10">
      @livewire("education.index")
    </div>

  </x-page-container>
  
</x-app-layout>

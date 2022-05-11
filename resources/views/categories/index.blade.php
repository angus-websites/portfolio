@section('title', 'Categories')

<x-app-layout>
  <x-page-container>
    <x-page-title title="Categories" subtitle="Here you can add and remove categories" />

    <!--Categories-->
    <div class="mt-10">
      @livewire("categories.index")
    </div>
  </x-page-container>
  
</x-app-layout>

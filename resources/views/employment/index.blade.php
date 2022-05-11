@section('title', 'Employments')
<x-app-layout>
  <x-page-container>
    <x-page-title title="Employment" subtitle="Here you can add, remove and modify employment history" />

    <!--Employment-->
    <div class="mt-10">
      @livewire("employment.index")
    </div>

  </x-page-container>
  
</x-app-layout>

@section('title', 'Tags')

<x-app-layout>
  <x-page-container>
    <x-page-title title="Tags" subtitle="Here you can add, remove and modify project tags" />
    <!--Tags-->
    <div class="y-10">
      @livewire("tags.edit")
    </div>
  </x-page-container>
  
</x-app-layout>

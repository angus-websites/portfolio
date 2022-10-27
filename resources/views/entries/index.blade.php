@section('title', 'Entries')
@section('description', 'View my dissertation entries on my portfolio site')

<x-app-layout>
  <x-page-container>
    <x-page-title title="My Entries" subtitle="Here you will find the entries for my dissertation project" />

    <!--Projects-->
    <div class="py-20">
      @livewire("entry.index")
    </div>

  </x-page-container>

</x-app-layout>

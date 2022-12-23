@section('title', "New Entry")

<x-app-layout>
  <x-page-container>
    <x-page-title title="New Entry" subtitle="Here you can create a new dissertation entry" backLink="{{route('entries.index')}}" backText="Entries"/>

    <!--Edit-->
    <div class="my-10">
      @livewire("entries.edit", ['entry' => $entry])
    </div>
  </x-page-container>

</x-app-layout>

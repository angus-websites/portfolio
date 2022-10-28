@section('title', "Edit entry")

<x-app-layout>
  <x-page-container>
    <x-page-title title="Edit Entry" subtitle="Here you can edit the details of this entry or delete the entry" backLink="{{route('entries.index')}}" backText="Entries"/>

    <!--Edit-->
    <div class="my-10">
      @livewire("entries.edit", ['entry' => $entry])
    </div>
  </x-page-container>

</x-app-layout>

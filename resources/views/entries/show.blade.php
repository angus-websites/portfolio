@section('title', $entry->title)

<x-app-layout>
  <x-page-container>
    <x-page-title title="{{$entry->title}}" subtitle="Viewing entry" backLink="{{route('entries.index')}}" backText="Entries"/>

    <!--Edit-->
    <div class="my-10">
      <pre>
          {{$entry->content}}
      </pre>
    </div>
  </x-page-container>

</x-app-layout>

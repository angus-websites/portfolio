@section('title', $entry->title)

<x-app-layout>
  <x-page-container>
    <x-page-title title="{{$entry->title}}" subtitle="Viewing entry" backLink="{{route('entries.index')}}" backText="Entries"/>

    <!--Edit-->
    <div class="my-10">
      <article class="prose w-full">
          {!! $entry->content !!}
      </article>
    </div>
  </x-page-container>

</x-app-layout>

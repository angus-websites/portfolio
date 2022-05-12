@section('title', 'Edit Employment')

<x-app-layout>
  <x-page-container>
  
    <x-page-title title="Edit Employment" subtitle="Here you can edit the details of this employment" backLink="{{route('employment.index')}}" backText="Employment"/>

    <div class="mt-10">
      <!--Edit-->
      @livewire("employment.edit", ["employment" => $employment])
    </div>
  </x-page-container>
</x-app-layout>

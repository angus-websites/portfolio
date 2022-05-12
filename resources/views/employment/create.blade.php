@section('title', 'Create Employment')

<x-app-layout>
  <x-page-container>
    <x-page-title title="New Employment" subtitle="Here you can create a new Employment" backLink="{{route('employment.index')}}" backText="Employment"/>

    <div class="mt-10">
      <!--Create-->
      @livewire("employment.edit", ["employment" => $employment])
    </div>
  </x-page-container>
</x-app-layout>


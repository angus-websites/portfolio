@section('title', 'Create Education')

<x-app-layout>
  <x-page-container>
    <x-page-title title="New Education" subtitle="Here you can create a new Education" backLink="{{route('education.index')}}" backText="Education"/>

    <div class="mt-10">
      <!--Create-->
      @livewire("education.edit", ["education" => $education])
    </div>
  </x-page-container>
</x-app-layout>

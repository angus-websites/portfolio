@section('title', 'Edit Education')

<x-app-layout>
  <x-page-container>
  
    <x-page-title title="Edit Education" subtitle="Here you can edit the details of this education" backLink="{{route('education.index')}}" backText="Education"/>

    <div class="mt-10">
      <!--Edit-->
      @livewire("education.edit", ["education" => $education])
    </div>
  </x-page-container>
</x-app-layout>

@section('title', "New skill")

<x-app-layout>
  <x-page-container>
    <x-page-title title="Create Skill" subtitle="Here you can create a new skill" backLink="{{route('skills.index')}}" backText="Skills"/>

    <!--Edit-->
    <div class="my-10">
      @livewire("skills.edit", ['skill' => $skill])
    </div>
  </x-page-container>
  
</x-app-layout>

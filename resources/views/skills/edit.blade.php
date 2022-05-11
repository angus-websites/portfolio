@section('title', "Edit skill")

<x-app-layout>
  <x-page-container>
    <x-page-title title="Edit Skill" subtitle="Here you can edit the details of this skill or delete the skill" backLink="{{route('skills.index')}}" backText="Skills"/>

    <!--Edit-->
    <div class="my-10">
      @livewire("skills.edit", ['skill' => $skill])
    </div>
  </x-page-container>
  
</x-app-layout>

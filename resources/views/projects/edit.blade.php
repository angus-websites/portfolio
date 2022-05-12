@section('title', 'Edit - '.$project->name)

<x-app-layout>
  <x-page-container>
    <x-page-title title="Edit Project" subtitle="Here you can edit a project" />
    
    <div class="mt-10">
      <!--Edit-->
      @livewire("projects.edit", ["project" => $project])
    </div>
  </x-page-container>
</x-app-layout>

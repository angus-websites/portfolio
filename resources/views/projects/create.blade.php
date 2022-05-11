<x-app-layout>
  <x-page-container>

    <x-page-title title="Create Project" subtitle="Here you can create a new project" />
    <div class="mt-10">
      <!--Create-->
      @livewire("projects.edit", ["project" => $new_project])
    </div>
  </x-page-container>
</x-app-layout>

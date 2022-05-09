@section('title', 'Projects')
@section('description', 'View my projects on my portfolio site')

<x-app-layout>
  <div class="container px-5 pt-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">My Projects</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Here you will find the projects I am currently working on, as well as the ones I have previously worked on</p>
    </div>
  </div>
 
  <!--Projects-->
  <div class="container px-5 py-24 mx-auto">
    @livewire("projects.index")
  </div>
</x-app-layout>

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
    
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
      @forelse ($projects as $project)
        <x-cards.project-card :project="$project"/>
      @empty
        <div class="col-span-full">
          <div class="p-5 text-center">
            <div class="badge">No Projects found</div>
          </div>
        </div>
      @endforelse
    </div>
  </div>
</x-app-layout>

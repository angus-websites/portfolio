@section('title', 'Projects')

<x-app-layout>
  <div class="container px-5 pt-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">My Projects</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
    </div>
  </div>
  <!--Create project-->
  @can('create', App\Models\Project::class)
    <div class="mt-3 flex">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-auto">
        New Project
      </button>
    </div>
  @endcan
  <!--Projects-->
  <div class="container px-5 py-24 mx-auto">
    
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
      @foreach ($projects as $project)
        <x-cards.project-card :project="$project"/>
      @endforeach
    </div>
  </div>
</x-app-layout>

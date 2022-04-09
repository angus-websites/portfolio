@section('title', 'Projects')

<x-app-layout>
  <div class="container px-5 pt-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">My Projects</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
    </div>
  </div>

  <!--Button flexbox -->
  @auth
    <div class="container px-5 mx-auto flex flex-col gap-y-4 md:flex-row md:justify-around mt-4">

      @can('create', App\Models\Project::class)
        <!--Create project-->
        <div class="mt-3 flex justify-center">
          <x-link-button class="btn-primary" href="{{ route('projects.create') }}">
            New Project
          </x-link-button>
        </div>
      @endcan

      @can("viewAny", App\Models\Category::class)
          <div>
            <x-link-button href="{{route('categories.index') }}"  class="btn btn-secondary">
                Manage Categories
            </x-link-button>
          </div>
      @endcan

    </div>
  @endauth

  
  <!--Projects-->
  <div class="container px-5 py-24 mx-auto">
    
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
      @foreach ($projects as $project)
        <x-cards.project-card :project="$project"/>
      @endforeach
    </div>
  </div>
</x-app-layout>

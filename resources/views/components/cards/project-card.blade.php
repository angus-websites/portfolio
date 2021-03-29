
<div class="projectCard">
  <a href="{{$link}}">
    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
      <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{$imagePath}}" alt="{{$getAlt()}}">
      <div class="p-6">
        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{$category}}</h2>
        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$title}}</h1>
        <p class="leading-relaxed mb-3">{{$description}}</p>
      </div>
    </div>
  </a>
  @can('update', $project)
    <div class="mt-3 flex">
      <x-link-button href="{{$project->get_edit_url()}}" class="text-center bg-indigo-100 hover:bg-indigo-300 text-indigo-600 hover:text-white flex-grow">Edit</x-link-button>
    </div>
  @endcan
</div>



<div class="projectCard ">
  <div class="h-full">
    <a href="{{$link}}">
      <div class="h-full bg-base-200 border rounded-lg overflow-hidden">
        <img class="lg:h-48 md:h-36 w-full object-cover object-center bg-base-300" height="60" src="{{$imagePath}}" alt="{{$getAlt()}}">
        <div class="p-6 border-t-2 border-gray-100 flex-row space-y-4">
          <h2 class="title-font text-lg font-medium text-gray-900">{{$title}}</h2>
          <div class="flex flex-row">
            <p class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 flex-1">{{$project->category()->short_name}}</p>
            <div class="divider divider-horizontal"></div>
            @if ($project->coming_soon)
            <div class="badge badge-info">Coming soon</div>
            @else
            <p class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1 flex-1 text-right">{{$project->yearMade()}}</p>
            @endif
          </div>
          <p class="leading-relaxed">{{$description}}</p>
        </div>
      </div>
    </a>
  </div>
</div>


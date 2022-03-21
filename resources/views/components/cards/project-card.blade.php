
<div class="projectCard ">
  <div class="h-full">
    <a href="{{$link}}">
      <div class="h-full bg-white rounded-lg overflow-hidden">
        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{$imagePath}}" alt="{{$getAlt()}}">
        <div class="p-6 border-t-2 border-gray-100">
          <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{$project->category()->short_name}}</h2>
          <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$title}}</h1>
          <p class="leading-relaxed mb-3">{{$description}}</p>
        </div>
      </div>
    </a>
  </div>
</div>


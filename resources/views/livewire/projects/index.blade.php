<div>
    <!-- Filter bar -->
    <div id="filterBar" class="grid grid-cols-3  mb-10">

        <p>Current cargeory: {{$current_category->id ?? "null"}}</p>
        <!-- Tabs -->
        <div class="tabs justify-center col-start-2">
            <button wire:click="showAll" class="tab tab-bordered {{$show_all ? 'tab-active' : ''}}">All</button> 
            @foreach($categories as $category)
                <button wire:click="changeCategory({{$category->id}})" class="tab tab-bordered {{ $this->isCategoryActive($category) ? 'tab-active' : ''}}">{{$category->short_name}}</button> 

            @endforeach
        </div>

        <!-- Sort select -->
        <div class="text-right">
            <select class="select max-w-xs">
              <option disabled selected>Sort by</option>
              <option>Homer</option>
              <option>Marge</option>
              <option>Bart</option>
              <option>Lisa</option>
              <option>Maggie</option>
            </select>
        </div>
    </div>
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

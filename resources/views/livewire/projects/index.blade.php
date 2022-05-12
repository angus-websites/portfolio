<div>
    @if(count($projects) > 0)
        <!-- Filter bar -->
        <div id="filterBar" class="grid grid-cols-1 lg:grid-cols-3 gap-4  mb-10">

            @if(count($categories) > 0)
                <!-- Tabs -->
                <div class="tabs justify-center lg:col-start-2">
                    <button wire:click="showAll" class="tab tab-bordered {{$show_all ? 'tab-active' : ''}}" aria-label="Show all projects">All</button> 
                    @foreach($categories as $category)
                        <button wire:click="changeCategory({{$category->id}})" class="tab tab-bordered {{ $this->isCategoryActive($category) ? 'tab-active' : ''}}" aria-label="Show all {{$category->short_name}} projects">{{$category->short_name}}</button> 

                    @endforeach
                </div>
            @endif

            <div class="lg:text-right lg:col-start-3 text-center">
              <x-select wire:model="sort_by" id="sortBy" aria-label="Sort the projects">
                <option disabled>Sort by</option>
                <option value="name">Project Name</option>
                <option value="newest">Newest</option>
                <option value="oldest">Oldest</option>
              </x-select>
            </div>
        </div>
    @endif
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
      @forelse ($projects as $project)
        <x-cards.project-card  :project="$project"/>
      @empty
        <div class="col-span-full">
          <div class="p-5 text-center">
            <div class="badge">No Projects found</div>
          </div>
        </div>
      @endforelse
    </div>
    @can("manage", App\Models\Project::class)
      <div class="my-20">
        <p class="text-center text-lg font-semibold"> Inactive projects </p>
      </div>
      <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-10">
        @forelse ($hidden as $hidden_project)
          <x-cards.project-card  :project="$hidden_project"/>
        @empty
          <div class="col-span-full">
            <div class="p-5 text-center">
              <div class="badge">No hidden projects found</div>
            </div>
          </div>
        @endforelse
      </div>
    @endcan

</div>

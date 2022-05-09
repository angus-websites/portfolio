<div>
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

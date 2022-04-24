<div>
    <!-- Tabs View -->
    <div class="tabs justify-center my-4">
        @foreach($sections as $section)
            <button wire:click="updateCurrent({{ $section->id }})" class="tab tab-lg tab-bordered {{ $active_section ==  $section ? 'tab-active' : ''  }}">{{$section->name}}</button>
        @endforeach
    </div>

    <!-- Content -->
    <div class="overflow-x-auto">
      <table class="table w-full">
        <!-- head -->
        <thead>
          <tr>
            <th></th>
            <th colspan="2">Skill</th>
          </tr>
        </thead>
        <tbody>
          @forelse($active_section->skills()->get() as $skill)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$skill->name}}</td>
                <td>
                    <x-link-button href="{{route('skills.edit', ['skill' => $skill])}}" class="btn-sm btn-warning">Edit</x-link-button>
                </td>
            </tr>
          @empty
            <tr>
                <td class="text-center" colspan="2">No Skills</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
</div>

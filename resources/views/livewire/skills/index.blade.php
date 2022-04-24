<div>

    <!--Button flexbox -->
    <div class="flex flex-col gap-y-4 md:flex-row md:justify-around my-8">

      @can("create", App\Models\Skill::class)
          <div>
            <x-link-button href="{{route('skills.create') }}"  class="btn btn-primary">
                Create Skill
            </x-link-button>
          </div>
      @endcan

      @can("create", App\Models\SkillSection::class)
          <div>
            <x-button wire:click="add"  class="btn btn-secondary">
                Create Section
            </x-button>
          </div>
      @endcan
    </div>

    <!-- Tabs View -->
    <div class="tabs justify-center my-4">
        @foreach($sections as $section)
            <button wire:click="changeSection({{ $section->id }})" class="tab tab-lg tab-bordered {{ $active_section->id ==  $section->id ? 'tab-active' : ''  }}">{{$section->name}}</button>
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
                    @can("update", $skill)
                        <x-link-button href="{{route('skills.edit', ['skill' => $skill])}}" class="btn-sm btn-warning">Edit</x-link-button>
                    @endcan
                </td>
            </tr>
          @empty
            <tr>
                <td class="text-center" colspan="2">No Skills</td>
            </tr>
          @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <div class="flex flex-row gap-x-4 justify-end">
                        @can("update", $active_section)
                            <x-button wire:click="editSection" class="btn-sm">Edit Section</x-button>
                        @endcan
                        @can("delete", $active_section)
                            <x-button class="btn-sm btn-error">Delete Section</x-button>
                        @endcan
                    </div>
                </td>
            </tr>
        </tfoot>
      </table>
    </div>

    <!-- Edit Section modal -->
    <x-modal-daisy id="editModal" wire:model.defer="edit_modal_open">
        <x-slot name="title">
            {{$this->is_create ? 'Create' : 'Edit'}} Skill Section
        </x-slot>

        <x-slot name="content">
            <div class="grid md:grid-cols-2 gap-4 p-4">
                <!-- Section name -->
                <div class="form-control col-span-2">
                    <x-label for="name" :value="__('Section name')" />
                    <x-input wire:model="editing_section.name"
                                class="input-bordered"
                                type="text"
                                showgreen="true"
                                error="editing_section.name"
                                required />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <label for="editModal" class="btn">Cancel</label>
            <x-button wire:click="saveSection" type="button" class="btn btn-primary">Save</x-button>
        </x-slot>
    </x-modal-daisy>

</div>

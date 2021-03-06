<div x-data="{ 'showEditModal': false }">

    <x-alerts.all />


    @can("create", \App\Models\Tag::class)
        <!--Add button-->
        <div class="my-5 text-center">
            <x-button wire:click="add" class="btn-primary">Create</x-button>
        </div>
    @endcan

    <div class="overflow-x-auto">
      <table class="table w-full">
        <thead>
            <tr>
                <th></th>
                <th colspan="2">Tag</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>
                        <x-tag :colour="$tag->colour" :textcolour="$tag->text_colour">
                          {{$tag->name}}
                        </x-tag>
                    </td>
                    <td>
                        <div class="flex flex-row justify-start items-center gap-x-4">
                            @can("update", $tag)
                                <x-button type="button" wire:click="edit({{$tag->id}})" class="btn btn-sm btn-warning">Edit</x-button>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>

    <!-- Edit Tag modal -->
    <x-modal-daisy id="editModal" wire:model.defer="modal_open">
        <x-slot name="title">
            {{$this->is_create ? 'Create' : 'Edit'}} Tag
        </x-slot>

        <x-slot name="content">
            <div class="grid md:grid-cols-2 gap-4 p-4">
                <!-- Tag name -->
                <div class="form-control col-span-2">
                    <x-label :value="__('Tag name')" />
                    <x-input wire:model="editing_tag.name"
                                class="input-bordered"
                                type="text"
                                showgreen="true"
                                error="editing_tag.name"
                                required />
                </div>

                <!-- Background colour -->
                <div class="form-control">
                    <x-label :value="__('Background Colour')" />
                    <x-input wire:model="editing_tag.colour"
                                class="input-bordered"
                                type="text"
                                showgreen="true"
                                error="editing_tag.colour"
                                required />
                </div>

                <!-- Text colour -->
                <div class="form-control">
                    <x-label :value="__('Text Colour')" />
                    <x-input wire:model="editing_tag.text_colour"
                                class="input-bordered"
                                type="text"
                                showgreen="true"
                                error="editing_tag.text_colour"
                                required />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            @if($this->editing_tag->exists)
                <x-button wire:click="delete" class="mr-auto btn-error">Delete</x-button>
            @endif
            <label for="editModal" class="btn">Cancel</label>
            <x-button wire:click="saveTag" type="button" class="btn btn-primary">Save</x-button>
        </x-slot>
    </x-modal-daisy>

</div>

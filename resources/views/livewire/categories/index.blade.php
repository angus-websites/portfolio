<div x-data="{ 'showDeleteModal': false }">

    <x-alerts.all />

    @can("create", \App\Models\Category::class)
        <!--Add button-->
        <div class="my-5 text-center">
            <x-button wire:click="add" class="btn-primary">Add</x-button>
        </div>
    @endcan

    <div class="overflow-x-auto">
      <table class="table w-full">
        <thead>
            <tr>
                <th></th>
                <th>Category</th>
                <th>Short name</th>
                <th>Projects</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->short_name}}</td>
                    <td>{{$category->projects()->count()}}</td>
                    <td>
                        <div class="flex flex-row justify-start items-center gap-x-4">
                            @can("update", $category)
                                <x-button type="button" wire:click="edit({{$category->id}})" class="btn btn-sm btn-warning">Edit</x-button>
                            @endcan
                            
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>

    <!-- Edit category modal -->
    <x-modal-daisy id="editModal" wire:model.defer="modal_open">
        <x-slot name="title">
            {{$this->is_create ? 'Create' : 'Edit'}} Category
        </x-slot>

        <x-slot name="content">
            <div class="grid md:grid-cols-2 gap-4 p-4">
                <!-- Category name -->
                <div class="form-control">
                    <x-label for="name" :value="__('Category name')" />
                    <x-input wire:model="editing_category.name"
                                class="input-bordered"
                                type="text"
                                showgreen="true"
                                error="editing_category.name"
                                required />
                </div>

                <!-- Short name -->
                <div class="form-control">
                    <x-label for="name" :value="__('Short name')" />
                    <x-input wire:model="editing_category.short_name"
                                class="input-bordered"
                                type="text"
                                showgreen="true"
                                error="editing_category.short_name"
                                required />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            @if($this->editing_category->projects()->count() < 1 && $this->editing_category->exists)
                <x-button wire:click="delete" class="mr-auto btn-error">Delete</x-button>
            @endif
            <label for="editModal" class="btn">Cancel</label>
            <x-button wire:click="saveCategory" type="button" class="btn btn-primary">Save</x-button>
        </x-slot>
    </x-modal-daisy>

</div>

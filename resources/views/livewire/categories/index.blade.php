<div x-data="{ toggle: @entangle('modal_open') }">
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
                        <div class="flex flex-row justify-center items-center gap-x-4">
                            <x-button type="button" x-on:click="toggle = ! toggle;$wire.edit({{$category->id}})" class="btn btn-sm btn-warning">Edit</x-button>
                            <x-button class="btn btn-sm btn-error">Delete</x-button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <label for="category-modal" class="btn modal-button">open modal</label>

    <!-- Edit Modal -->
    <input type="checkbox" x-model="toggle" id="category-modal" class="modal-toggle">
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Edit Category</h3>
            <div class="grid md:grid-cols-2 gap-4 p-4">
                <!-- Category name -->
                <div class="form-control">
                    <x-label for="name" :value="__('Category name')" />
                    <x-input wire:model="editing_category.name"
                                class="input-bordered"
                                type="text"
                                showgreen="true"
                                error="category.name"
                                required />
                </div>

                <!-- Short name -->
                <div class="form-control">
                    <x-label for="name" :value="__('Short name')" />
                    <x-input wire:model="editing_category.short_name"
                                class="input-bordered"
                                type="text"
                                showgreen="true"
                                error="category.short_name"
                                required />
                </div>
            </div>
            <div class="modal-action">
              <label for="category-modal" class="btn">Cancel</label>
              <x-button type="button" class="btn btn-primary">Save</x-button>
            </div>
        </div>
    </div>

</div>

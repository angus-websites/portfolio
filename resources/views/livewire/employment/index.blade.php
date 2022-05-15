<div>
    <x-alerts.all />

    <!--Button flexbox -->
    <div class="flex flex-col gap-y-4 md:flex-row md:justify-around my-8">

      @can("create", App\Models\Employment::class)
          <div>
            <x-link-button href="{{route('employment.create') }}"  class="btn btn-primary">
                Create Employment
            </x-link-button>
          </div>
      @endcan
    </div>


    <div class="overflow-x-auto">
      <table class="table w-full">
        <thead>
            <tr>
                <th></th>
                <th colspan="2">Employment</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employments as $employment)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>
                        <b>{{$employment->employer}}</b> - {{$employment->role}}
                    </td>
                    <td>
                        <div class="flex flex-row justify-start items-center gap-x-4">
                            @can("delete", $employment)
                                <x-button wire:click="showDelete({{$employment}})" class="btn btn-sm btn-error">Delete</x-button>
                            @endcan

                            @can("update", $employment)
                                <x-link-button href="{{route('employment.edit', ['employment' => $employment]) }}" class="btn btn-sm btn-warning">Edit</x-link-button>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>

    <!-- Delete Employment modal -->
    <x-modal-daisy id="deleteModal" wire:model.defer="delete_modal_open">
        <x-slot name="title">
            Delete Employment
        </x-slot>

        <x-slot name="content">
            <p>Are you sure you want to delete this employment?</p>
            <b>{{$employment_to_delete->employer}}</b>
        </x-slot>

        <x-slot name="footer">
            <label for="deleteModal" class="btn">Cancel</label>
            <x-button wire:click="deleteEmployment" type="button" class="btn btn-error">Delete</x-button>
        </x-slot>
    </x-modal-daisy>

</div>

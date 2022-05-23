<div>
    <x-alerts.all />

    <!--Button flexbox -->
    <div class="flex flex-col gap-y-4 md:flex-row md:justify-around my-8">

      @can("create", App\Models\Education::class)
          <div>
            <x-link-button href="{{route('education.create') }}"  class="btn btn-primary">
                Create Education
            </x-link-button>
          </div>
      @endcan
    </div>


    <div class="overflow-x-auto">
      <table class="table w-full">
        <thead>
            <tr>
                <th></th>
                <th colspan="2">Education</th>
            </tr>
        </thead>
        <tbody>
            @foreach($educations as $education)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>
                        <b>{{$education->institute}}</b> - {{$education->level}}
                    </td>
                    <td>
                        <div class="flex flex-row justify-start items-center gap-x-4">
                            @can("delete", $education)
                                <x-button wire:click="showDelete({{$education}})" class="btn btn-sm btn-error">Delete</x-button>
                            @endcan
                            @can("update", $education)
                                <x-link-button href="{{route('education.edit', ['education' => $education]) }}" class="btn btn-sm btn-warning">Edit</x-link-button>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>

    <!-- Delete Education modal -->
    <x-modal-daisy id="deleteModal" wire:model.defer="delete_modal_open">
        <x-slot name="title">
            Delete Education
        </x-slot>

        <x-slot name="content">
            <p>Are you sure you want to delete this education?</p>
            <b>{{$education_to_delete->institute}}</b>
        </x-slot>

        <x-slot name="footer">
            <label for="deleteModal" class="btn">Cancel</label>
            <x-button wire:click="deleteEducation" type="button" class="btn btn-error">Delete</x-button>
        </x-slot>
    </x-modal-daisy>

</div>

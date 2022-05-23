<div>

  <x-alerts.all />

  <!--Button flexbox -->
  <div class="flex flex-col gap-y-4 md:flex-row md:justify-around my-8">

    @can("create", App\Models\User::class)
        <div>
          <x-link-button href="{{route('users.create') }}"  class="btn btn-primary">
              Create User
          </x-link-button>
        </div>
    @endcan
  </div>

  <!-- User table -->
  <table class="table w-full">
    <!-- head -->
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Roles</th>
        <th colspan="2">Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach(\App\Models\User::all() as $user)
        <tr>
          <th>{{ $user->id }}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->role()->name}}</td>
          <td>{{$user->email}}</td>
          <td>
            @can('delete', $user)
              <x-button wire:click="showDelete({{$user}})" class="btn-sm btn-error">Delete</x-button>
            @endcan

            @can('update', $user)
              <x-link-button class="btn-sm btn-warning" href="{{route('users.edit', ['user'=>$user])}}">Edit</x-link-button>
            @endcan
            
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Delete Section modal -->
  <x-modal-daisy id="deleteModal" wire:model.defer="delete_modal_open">
      <x-slot name="title">
          Delete User
      </x-slot>

      <x-slot name="content">
          <p>Are you sure you want to delete {{$user_to_delete->name}}?</p>
      </x-slot>

      <x-slot name="footer">
          <label for="deleteModal" class="btn">Cancel</label>
          <x-button wire:click="deleteUser" type="button" class="btn btn-error">Delete</x-button>
      </x-slot>
  </x-modal-daisy>

</div>

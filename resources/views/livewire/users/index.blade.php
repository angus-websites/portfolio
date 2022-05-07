<div>
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
              @can('update', $user)
                <x-link-button class="btn-sm btn-warning" href="{{route('user.edit', ['user'=>$user])}}">Edit</x-link-button>
              @endcan
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>

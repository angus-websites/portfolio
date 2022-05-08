<div>

  @if (session()->has('success'))
      <div class="alert alert-success shadow-lg mb-5">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{ session('success') }}</span>
        </div>
      </div>
  @endif

  @if (session()->has('info'))
      <div class="alert alert-info shadow-lg mb-5">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          <span>{{ session('info') }}</span>
        </div>
      </div>
  @endif

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
            @can('update', $user)
              <x-link-button class="btn-sm btn-warning" href="{{route('users.edit', ['user'=>$user])}}">Edit</x-link-button>
            @endcan
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

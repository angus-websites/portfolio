@section('title', 'Dashboard')

<x-app-layout>
    <div class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
      <!--Title-->
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Dashboard</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Welcome to the Dashboard, from here you can manage the site</p>
      </div>

      <!-- Main grid -->
      <div class="flex flex-col space-y-8 my-10">
        <!--Top Grid -->
        <div class="grid grid-cols-3 bg-base-200 border rounded-lg p-5">
          <!--Menu-->
          <div class="col-span-1">
            <ul class="menu menu-compact lg:menu-normal w-60 p-2 border-r h-full">
              <li class="menu-title"><span>Manage</span></li>
              @can("viewAny", App\Models\Category::class)
                <li>
                  <a class="flex flex-row items-center" href="{{route('categories.index')}}">
                    <span class="flex-1">Categories</span>
                    <span class="badge">{{\App\Models\Category::count()}}</span>
                  </a>
                </li>
              @endcan
              @can('viewAny', App\Models\Skill::class)
                <li>
                  <a class="flex flex-row items-center" href="{{route('skills.index')}}">
                    <span class="flex-1">Skills</span>
                    <span class="badge">{{\App\Models\Skill::count()}}</span>
                  </a>
                </li>
              @endcan
              @can('viewAny', App\Models\Tag::class)
                <li>
                  <a class="flex flex-row items-center" href="{{route('tags.index')}}">
                    <span class="flex-1">Tags</span>
                    <span class="badge">{{\App\Models\Tag::count()}}</span>
                  </a>
                </li>
              @endcan
              @can('viewAny', App\Models\Employment::class)
                <li>
                  <a class="flex flex-row items-center" href="{{route('employment.index')}}">
                    <span class="flex-1">Employment</span>
                    <span class="badge">{{\App\Models\Employment::count()}}</span>
                  </a>
                </li>
              @endcan
              @can('viewAny', App\Models\Education::class)
                <li>
                  <a class="flex flex-row items-center" href="{{route('education.index')}}">
                    <span class="flex-1">Education</span>
                    <span class="badge">{{\App\Models\Education::count()}}</span>
                  </a>
                </li>
              @endcan
            </ul>
          </div>
          <!-- Info -->
          <div class="col-span-2">
            <div class="mx-auto">
              <!-- User info -->
              <div class="mb-8">
                <p>Name: <b>{{Auth::user()->name}}</b></p>
                <p class="flex flex-row space-x-2 items-center">
                  <span>Role</span>
                  <span class="badge">{{Auth::user()->role()->name}}</span>
                </p>
              </div>
            </div>
          </div>
        </div>

        @can("manage", App\Models\Project::class)
          <!-- Projects Collapse-->
          <div class="collapse rounded-lg bg-base-200 collapse-plus border">
            <input type="checkbox">
            <div class="collapse-title">
              <div class="px-5">Manage Projects</div>
            </div>
            <div class="collapse-content">
              <div class="px-5">
                <!-- Create project -->
                @can('create', App\Models\Project::class)
                  <!--Create project-->
                  <div class="mt-3 mb-6 flex">
                    <x-link-button class="btn-primary" href="{{ route('projects.create') }}">
                      New Project
                    </x-link-button>
                  </div>
                @endcan
                <!-- Project table -->
                <table class="table w-full">
                  <!-- head -->
                  <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th colspan="2">Category</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(\App\Models\Project::all() as $project)
                      <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{$project->name}}</td>
                        <td>{{$project->category()->name}}</td>
                        <td>
                          @can('update', $project)
                            <x-link-button class="btn-sm btn-warning" href="{{route('projects.edit', ['project'=>$project])}}">Edit</x-link-button>
                          @endcan
                          <x-link-button class="btn-sm btn-info" href="{{route('projects.show', ['project'=>$project])}}">View</x-link-button>

                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        @endcan

        @can("manage", App\Models\User::class)
          <!-- Users Collapse-->
          <div class="collapse rounded-lg bg-base-200 collapse-plus border">
            <input type="checkbox">
            <div class="collapse-title">
              <div class="px-5">Manage Users</div>
            </div>
            <div class="collapse-content">
              <div class="px-5">
                <!-- Create project -->
                @can('create', App\Models\User::class)
                  <!--Create project-->
                  <div class="mt-3 mb-6 flex">
                    <x-link-button class="btn-primary" href="{{ route('user.create') }}">
                      New User
                    </x-link-button>
                  </div>
                @endcan
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
            </div>
          </div>
        @endcan
      </div>

    </div>
</x-app-layout>

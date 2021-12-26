@section('title', 'Welcome')
<x-app-layout>
  <div class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">

    <!--Text align div-->
    <div class="sm:text-center lg:text-left">
      <!--Title-->
      <h1 class="text-4xl tracking-tight font-bold text-gray-900 sm:text-5xl md:text-6xl">
        <span class="block xl:inline">Welcome to my</span>
        <span class="block text-golden xl:inline">website</span>
      </h1>
      <!--Subtitle-->
      <p class="text-golden-dark mt-3 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
        Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.
      </p>
      <!--Buttons-->
      <x-button-group class="mt-5 sm:mt-8 sm:justify-center lg:justify-start">
        <a href="#" class="btn btn-primary sm:btn-lg">
          Projects
        </a>
        <a href="#" class="btn btn btn-secondary sm:btn-lg">
          Contact
        </a>
        <a href="#" class="btn btn btn-accent sm:btn-lg">
          Other
        </a>
      </x-button-group>
    </div>
    <!--My skills-->
    <div class="text-center mt-40">

      <!--Skills section-->
      <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">My Skills</h1>
      <div class="grid grid-cols-1 gap-x-6 gap-y-10 xs:grid-cols-2 md:grid-cols-3 my-16 px-5">
        @foreach($skills as $skill)
          <!--Skill container-->
          <div>
            <!--Logo-->
            <div class="avatar">
              <div class="mb-8 rounded-full w-24 h-24 ring ring-primary ring-offset-base-100 ring-offset-2">
                <img src="{{$skill->get_image()}}">
              </div>
            </div>
            <!--Skill name-->
            <p class="uppercase text-lg font-bold">{{$skill->name}}</p>
            <!--Description-->
            <p class="mt-5 text-base text-justify">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
            </p>
          </div>
        @endforeach
      </div>

      <!--Education section-->
      <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Education</h1>
      <div class="grid grid-cols-1 gap-x-6 gap-y-10 xs:grid-cols-2 md:grid-cols-3 my-16 px-5">
        @foreach($education as $edu)
          <!--Skill container-->
          <div>
            <p>{{$edu->institute}}</p>
          </div>
        @endforeach
      </div>

      <!--Employment section-->
      <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Employment</h1>
      <div class="grid grid-cols-1 gap-x-6 gap-y-10 xs:grid-cols-2 md:grid-cols-3 my-16 px-5">
        @foreach($employment as $work)
          <!--Skill container-->
          <div>
            <p>{{$work->employer}}</p>
            <ul>
              @foreach ($work->responsibilities()->get() as $r)
                <li>{{$r->content}}</li>
              @endforeach
            </ul>
          </div>
        @endforeach
      </div>
    </div>
  </div>

</x-app-layout>

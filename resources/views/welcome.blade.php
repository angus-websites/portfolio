@section('title', 'Welcome')
<x-app-layout>
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">

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
      <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl">My Skills</h1>
      @can('create', App\Models\Skill::class)
        <div class="my-5">
          <a href="{{{ route("skills.index") }}}" class="btn btn-secondary btn-sm">Manage</a>
        </div>
      @endcan
      <div class="grid grid-cols-1 gap-x-6 gap-y-10 xs:grid-cols-2 md:grid-cols-3 my-16">
        @foreach($skillSections as $section)
          <!--Section container-->
          <x-cards.skill-section-card :section="$section"/>
        @endforeach
      </div>

      <div class="grid grid-cols-1 gap-y-16 gap-x-10 lg:grid-cols-2">

        <!--Employment section-->
        <div>
          <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl">Employment</h1>
          <div class="grid grid-cols-1 gap-x-6 gap-y-10 mt-8 md:grid-cols-2 lg:grid-cols-1">
            @foreach($employment as $work)
              <x-cards.employment-card :employment="$work"/>
            @endforeach

          </div>

        </div>
        <!--Education section-->
        <div>
          <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl">Education</h1>
          <div class="grid grid-cols-1 gap-x-6 gap-y-10 mt-8 md:grid-cols-2 lg:grid-cols-1">
            @foreach($education as $edu)
              <x-cards.education-card :education="$edu"/>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>

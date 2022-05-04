@section('title', 'Welcome')
<x-app-layout>
  <div class="my-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:my-20 lg:px-8 xl:mt-28">

    <div class="grid-cols-1 space-y-40">
      <!--Text align div-->
      <div class="sm:text-center lg:text-left">
        <!--Title-->
        <h1 class="text-4xl tracking-tight font-bold sm:text-5xl md:text-6xl">
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

      @if(count($skillSections) > 0)
        <div id="skillSection">
          <!--Skills section-->
          <h2 class="text-2xl font-bold sm:text-3xl text-center">My Skills</h2>
          <div class="flex flex-wrap justify-around gap-x-6 gap-y-10 my-16">
            @foreach($skillSections as $section)
              <!--Section container-->
              <x-cards.skill-section-card :section="$section" class="basis-full xs:basis-1/3 lg:basis-1/4 flex-1"/>
            @endforeach
          </div>
        </div>
      @endif

      <div id="employmentEducationSection" class="grid grid-cols-1 gap-y-16 gap-x-10 lg:grid-cols-2">
        @if(count($employment) > 0)
          <!--Employment section-->
          <div>
            <h2 class="text-2xl font-bold sm:text-3xl text-center">Employment</h2>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 mt-8 md:grid-cols-2 lg:grid-cols-1">
              @forelse($employment as $work)
                <x-cards.employment-card :employment="$work"/>
              @empty
                <div class="col-span-full">
                  <div class="p-5 text-center">
                    <div class="badge">No Employment found</div>
                  </div>
                </div>
              @endforelse
            </div>
          </div>
        @endif

        @if(count($education) > 0)
          <!--Education section-->
          <div>
            <h2 class="text-2xl font-bold sm:text-3xl text-center">Education</h2>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 mt-8 md:grid-cols-2 lg:grid-cols-1">
              @forelse($education as $edu)
                <x-cards.education-card :education="$edu"/>
              @empty
                <div class="col-span-full">
                  <div class="p-5 text-center">
                    <div class="badge">No Education found</div>
                  </div>
                </div>
              @endforelse
            </div>
          </div>
        @endif
      </div>

  </div>

</x-app-layout>

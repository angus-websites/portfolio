@section('title', 'Welcome')
@section('description', "View Angus Goody's Portfolio and find out about his projects")
<x-app-layout>

  <!-- Top hero-->
  <div class="hero lg:min-h-screen my-20 lg:my-0 xl:my-20 xl:min-h-[50%]">
    <div class="hero-content text-center">
      <div class="lg:max-w-xl max-w-md">
        <h1 class="text-5xl font-bold">Welcome to my website</h1>
        <p class="py-6">I am a computer science student at The University Of Sheffield</p>
        <x-button-group class="mt-5 sm:mt-8 justify-center">
          <a href="{{route("projects.index")}}" class="btn btn-primary sm:btn-lg">
            Projects
          </a>
          <a href="{{route("contact")}}" class="btn btn btn-secondary sm:btn-lg">
            Contact
          </a>
          <a href="{{route("about")}}" class="btn btn btn-accent sm:btn-lg">
            About
          </a>
        </x-button-group>
      </div>
    </div>
  </div>

  <div class="mb-40 mx-auto max-w-7xl px-4 sm:px-6">

    <div class="grid-cols-1 sm:space-y-32 space-y-20">
    
      <div id="employmentEducationSection" class="grid grid-cols-1 gap-y-10 gap-x-10 lg:grid-cols-2">
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

      @if(count($skillSections) > 0)

        <div id="skillSection">
          <!--Skills section-->
          <h2 class="text-2xl font-bold sm:text-3xl text-center">My Skills</h2>
          @foreach($skillSections as $section)
            @if(count($section->skills()->get()) > 0)
              <!--Section container-->
              <x-cards.skill-section-card :section="$section" class=""/>
            @endif
          @endforeach
        </div>
      @endif

    </div>
  </div>

</x-app-layout>

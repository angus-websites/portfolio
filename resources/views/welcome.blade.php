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

    <div class="grid-cols-1 space-y-40">
    
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

  <!-- new -->
  <div class="relative bg-white py-24 sm:py-32 lg:py-40">
    <div class="mx-auto max-w-md px-6 text-center sm:max-w-3xl lg:max-w-7xl lg:px-8">
      <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">My Skills</h2>
      <p class="mx-auto mt-5 max-w-prose text-xl text-gray-500">Phasellus lorem quam molestie id quisque diam aenean nulla in. Accumsan in quis quis nunc, ullamcorper malesuada. Eleifend condimentum id viverra nulla.</p>
      @foreach($skillSections as $section)
        <div class="mt-10">
          <h3> Section bro </h3>
          <!-- Each Section -->
          <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3">

            <!-- Each Section -->
            @foreach($skillSections as $section)

              <!-- Each skill -->
              <div class="pt-6">
                <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                  <div class="-mt-6">
                    <div>
                      <span class="inline-flex items-center justify-center rounded-xl bg-indigo-500 p-3 shadow-lg">
                        <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                        </svg>
                      </span>
                    </div>
                    <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">Push to Deploy</h3>
                    <p class="mt-5 text-base leading-7 text-gray-600">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                  </div>
                </div>
              </div>
            @endforeach

            <div class="pt-6">
              <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                <div class="-mt-6">
                  <div>
                    <span class="inline-flex items-center justify-center rounded-xl bg-indigo-500 p-3 shadow-lg">
                      <!-- Heroicon name: outline/lock-closed -->
                      <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                      </svg>
                    </span>
                  </div>
                  <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">SSL Certificates</h3>
                  <p class="mt-5 text-base leading-7 text-gray-600">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                </div>
              </div>
            </div>

            <div class="pt-6">
              <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                <div class="-mt-6">
                  <div>
                    <span class="inline-flex items-center justify-center rounded-xl bg-indigo-500 p-3 shadow-lg">
                      <!-- Heroicon name: outline/arrow-path -->
                      <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                      </svg>
                    </span>
                  </div>
                  <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">Simple Queues</h3>
                  <p class="mt-5 text-base leading-7 text-gray-600">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                </div>
              </div>
            </div>

            <div class="pt-6">
              <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                <div class="-mt-6">
                  <div>
                    <span class="inline-flex items-center justify-center rounded-xl bg-indigo-500 p-3 shadow-lg">
                      <!-- Heroicon name: outline/shield-check -->
                      <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                      </svg>
                    </span>
                  </div>
                  <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">Advanced Security</h3>
                  <p class="mt-5 text-base leading-7 text-gray-600">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                </div>
              </div>
            </div>

            <div class="pt-6">
              <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                <div class="-mt-6">
                  <div>
                    <span class="inline-flex items-center justify-center rounded-xl bg-indigo-500 p-3 shadow-lg">
                      <!-- Heroicon name: outline/cog -->
                      <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                      </svg>
                    </span>
                  </div>
                  <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">Powerful API</h3>
                  <p class="mt-5 text-base leading-7 text-gray-600">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                </div>
              </div>
            </div>

            <div class="pt-6">
              <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                <div class="-mt-6">
                  <div>
                    <span class="inline-flex items-center justify-center rounded-xl bg-indigo-500 p-3 shadow-lg">
                      <!-- Heroicon name: outline/server -->
                      <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 17.25v-.228a4.5 4.5 0 00-.12-1.03l-2.268-9.64a3.375 3.375 0 00-3.285-2.602H7.923a3.375 3.375 0 00-3.285 2.602l-2.268 9.64a4.5 4.5 0 00-.12 1.03v.228m19.5 0a3 3 0 01-3 3H5.25a3 3 0 01-3-3m19.5 0a3 3 0 00-3-3H5.25a3 3 0 00-3 3m16.5 0h.008v.008h-.008v-.008zm-3 0h.008v.008h-.008v-.008z" />
                      </svg>
                    </span>
                  </div>
                  <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">Database Backups</h3>
                  <p class="mt-5 text-base leading-7 text-gray-600">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>


</x-app-layout>

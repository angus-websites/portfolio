@section('title', 'Skills')

<x-app-layout>
  <div class="container px-5 pt-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">My Skills</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">My skills go here</p>
    </div>
  </div>
  <!--Skills-->
  <div class="container px-5 py-24 mx-auto">
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 xs:grid-cols-2 md:grid-cols-3 my-16">
        @foreach($sections as $section)
          <!--Section container-->
          <x-cards.skill-section-card :section="$section"/>
        @endforeach
      </div>
  </div>
</x-app-layout>

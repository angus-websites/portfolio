@section('title', 'Education')

<x-app-layout>
  <div class="container px-5 pt-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Education</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Here you can add, remove and modify education history</p>
    </div>
  </div>
  <!--Index-->
  <div class="container px-5 my-10 mx-auto">
    @livewire("education.index")
  </div>
</x-app-layout>

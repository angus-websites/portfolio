@section('title', 'Users')

<x-app-layout>
  <div class="container px-5 pt-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Users</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">You can manage the users here</p>
    </div>
  </div>
  <!--Skills-->
  <div class="container px-5 my-10 mx-auto">
    <!--Skills-->
    @livewire("user.index")
  </div>
</x-app-layout>

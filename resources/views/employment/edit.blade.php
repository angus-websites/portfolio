@section('title', 'Edit Employment')

<x-app-layout>
  <section class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Edit Employment</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Here you can edit the details of this employment</p>
    </div>

    <div class="mt-10">
      <!--Edit-->
      @livewire("employment.edit", ["employment" => $employment])
    </div>
  </section>
</x-app-layout>

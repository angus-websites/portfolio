@section('title', 'Account')

<x-app-layout>
    <div class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
      <!--Title-->
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Account</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Here you can manage your account details</p>
      </div>

      <!-- Main grid -->
      <div class="flex flex-col space-y-8 my-10">
        <!--Account -->
        <div>
          @livewire("users.account", ["user" => Auth::user()])
        </div>
      </div>

    </div>
</x-app-layout>

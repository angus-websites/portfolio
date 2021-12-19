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
  </div>

</x-app-layout>

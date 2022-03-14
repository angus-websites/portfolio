<x-master-layout>
  @push("styleheets")
    @livewireStyles
  @endpush
  @push("scripts")
    @livewireScripts
  @endpush
  @include('includes.navigation')
  @include('includes.flash')
  <main class="text-base-content body-font overflow-hidden min-h-screen">
    {{ $slot }}
  </main>
  @section("footer")
    @include('includes.footer')
  @endsection
</x-master-layout>

<x-master-layout>
  @include('includes.navigation')
  @include('includes.flash')
  <main class="text-base-content body-font overflow-hidden min-h-screen">
    {{ $slot }}
  </main>
  @include('includes.footer')
</x-master-layout>

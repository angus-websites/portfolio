<x-master-layout>
  @include('includes.navigation-guest')
  <main class="text-gray-600 body-font overflow-hidden min-h-screen">
    {{ $slot }}
  </main>
  @include('includes.footer-guest')
</x-master-layout>

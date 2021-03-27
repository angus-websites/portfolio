<x-master-layout>
  @include('includes.navigation-guest')
  <div class="font-sans text-gray-900 min-h-screen antialiased">
    {{ $slot }}
  </div>
  @include('includes.footer-guest')
</x-master-layout>

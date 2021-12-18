<x-master-layout>
  @include('includes.navbar-naked')
  <main class="text-base-content overflow-hidden min-h-screen">
    {{ $slot }}
  </main>
  @include('includes.footer')
</x-master-layout>
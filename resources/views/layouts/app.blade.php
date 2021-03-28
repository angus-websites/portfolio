<x-master-layout>
  @include('includes.navigation')
  <!-- Page Heading -->
  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      {{ $header }}
    </div>
  </header>
  <!-- Page Content -->
  <main class="text-gray-600 body-font overflow-hidden min-h-screen">
    {{ $slot }}
  </main>
  @include('includes.footer-guest')
</x-master-layout>
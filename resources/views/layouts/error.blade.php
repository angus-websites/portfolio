<x-master-layout>
  @include('includes.navbar-naked')
  <main class="text-base-content overflow-hidden min-h-screen">
    {{ $slot }}
  </main>
  @section("footer")
    @include('includes.footer', ["links" => false])
  @endsection
</x-master-layout>
<x-master-layout>
  @push("styleheets")
    <livewire:styles />
  @endpush
  @push("scripts")
    <livewire:scripts />
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

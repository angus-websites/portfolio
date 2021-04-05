@section('title', 'Dashboard')

<x-app-layout>
    <div class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
      Dashboard
      <br>
      Roles: {{ print_r(Auth::user()->roles()->pluck('name')->toArray()) }}
    </div>
</x-app-layout>

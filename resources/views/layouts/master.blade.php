<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="portfolio">
  <!--Angus was here 2k21-->
  <head>
    <title>
        @if(View::hasSection('title'))
            @yield('title') | Angus
        @else
            Angus
        @endif
    </title>

    @include('includes.head-tags')
  </head>
  <body class="font-sans antialiased bg-base-100">
    {{ $slot }}

    <footer>
      @stack('scripts')
      @yield("footer")
    </footer>
  @stack('modals')
  </body>
</html>

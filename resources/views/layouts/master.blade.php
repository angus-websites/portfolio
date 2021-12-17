<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
  <body class="font-sans antialiased bg-base-200">
    {{ $slot }}
  </body>
</html>

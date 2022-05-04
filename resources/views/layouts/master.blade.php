@props(['bg' => 'bg-base-100'])

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
    <meta name="description" content="@yield('description', 'Welcome to my portfolio')">
    @include('includes.head-tags')
  </head>
  <body {!! $attributes->merge(['class' => "font-sans antialiased $bg"]) !!}>
    {{ $slot }}

    <footer>
      @stack('scripts')
      @yield("footer")
    </footer>
  @stack('modals')
  </body>
</html>

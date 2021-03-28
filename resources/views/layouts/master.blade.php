<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('includes.head-tags')
  </head>
  <body class="font-sans antialiased ">
    {{ $slot }}
  </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <!--Angus was here 2k21-->
  <head>
    @include('includes.head-tags')
  </head>
  <body class="font-sans antialiased ">
    {{ $slot }}
  </body>
</html>

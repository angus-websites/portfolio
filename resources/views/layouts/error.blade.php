<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title') | Portfolio</title>
    @include('includes.head-tags')
  </head>
  <body>
    @include('includes.navigation-naked')
    <div id="wrapper" class="has-background-background-main">
      @yield('content')
    </div>
    @include('includes.footer')
  </body>
</html>

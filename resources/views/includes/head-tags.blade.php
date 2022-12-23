<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="Angus Goody">
@stack('meta')

<!-- Facebook images n stuff -->
<meta property="og:image" content="{{ asset('assets/images/meta/banner.png') }}">
<meta property="twitter:image" content="{{ asset('assets/images/meta/banner.png') }}">

<!--canonical-->
<link rel="canonical" href="{{ url()->current() }}" />
<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('assets/images/core/favicon.png') }}">
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<!--Other stylesheets-->
@stack('stylesheets')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
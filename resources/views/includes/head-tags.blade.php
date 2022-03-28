<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('assets/images/core/favicon.png') }}">
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<!--Other stylesheets-->
@stack('stylesheets')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
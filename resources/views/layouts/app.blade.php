<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pet Adoption System</title>
  <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
  <style>
    body { padding-top: 65px; }
  </style>
</head>
<body>
  @include('partials.navbar')

  <div class="container my-4">
    @yield('content')
  </div>

  @include('partials.footer')

  <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

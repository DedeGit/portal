<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/ticker-style.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/slicknav.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
</head>

<body>

  <main>
    @yield('content')
  </main>



</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Monda&display=swap" rel="stylesheet">
  @yield('css')
  <title>@yield('title')</title>
</head>
<body>
  <nav class="dflex space-between">
    <a href="/" class="brand">
      <img src="{{ asset('img/logo.png') }}" alt="Logo Syncd Notes">
      <span>Sync'd Notes</span>
    </a>
    <div class="auth">
      <a href="/" class="register">Register</a>
      <a href="{{ route('login') }}" class="login">Login</a>
    </div>
    <button id="drawer" aria-label="Button untuk membuka navigation bar">☰</button>
  </nav>
  @yield('content')
  <script src="{{ asset('js/navbar.js') }}"></script>
</body>
</html>
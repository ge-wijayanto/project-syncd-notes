<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Monda&display=swap" rel="stylesheet">
  <title>@yield('title')</title>
</head>
<body>
  <header>
    <nav class="dflex">
      <div class="brand">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Syncd Notes">
        <span>Sync'd Notes</span>
      </div>
      <div class="auth">
        <a href="/" class="register">Register</a>
        <a href="/" class="login">Login</a>
      </div>
    </nav>
  </header>
  @yield('main')
</body>
</html>
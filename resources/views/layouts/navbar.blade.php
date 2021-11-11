<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Monda&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
      @guest
      <a href="{{ route('register') }}" class="register">Register</a>
      <a href="{{ route('login') }}" class="login">Login</a>
      @endguest
      @auth
      <a href="/dashboard" class="btn-green">Dashboard</a>
      <a href="/profile" class="btn-green">Profile</a>
      <form action="/signout" method="post" class="signOut">
        @csrf
        <button type="submit" class="btn-green btn-out">Logout</button>
      </form>
      @endauth
    </div>
    <button id="drawer" aria-label="Button untuk membuka navigation bar">☰</button>
  </nav>
  @yield('content')
  <script src="{{ asset('js/navbar.js') }}"></script>
  @yield('script')
</body>
</html>
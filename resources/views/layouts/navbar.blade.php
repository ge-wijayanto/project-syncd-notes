<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="pusher-app-key" content="{{ env('PUSHER_APP_KEY') }}">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Monda&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  @yield('css')
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>
    // Pusher.logToConsole = true;
    const key = document.querySelector('meta[name="pusher-app-key"]').content;

    let pusher = new Pusher(key, {
      cluster: 'ap1',
      encrypted: true
    });

    let channel = pusher.subscribe('syncd-notes');
    channel.bind('discussion', function(data) {
      const splitUrl = window.location.href.split('/');
      const id = splitUrl[splitUrl.indexOf('view') + 1]

      if (id == data.id) {
        console.log(data);
        const container = document.querySelector('.container');
        if (container.children[0].innerText === 'Start a conversation...') {
          container.children[0].remove();
        }
        container.innerHTML += templateMessage(data);
      }
    });

    const month = [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'May',
      'Jun',
      'July',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec'
    ];
    const dateFormated = (date) => {
      const d = new Date(date);
      return `${month[d.getMonth()]} ${d.getDate()}, ${d.getFullYear()}`
    }

    const templateMessage = (data) => `
      <div class="message">
          <span>${data.name} (${dateFormated(data.date)}) :</span> ${data.message}
      </div>
    `;

    
  </script>
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
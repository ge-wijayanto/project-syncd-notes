@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('title', 'Login')

@section('content')
  <main class="dflex align-center max-vh">
    <div id="loginContainer">
      <h2>Login</h2>
      <form action="/login" method="post">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Input username here...">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Input password here...">
        <div class="remember">
          <input type="checkbox" name="remember" id="remember">
          <label for="remember">Remember me</label>
        </div>
        <div class="action dflex">
          <a href="/">Back</a>
          <button type="submit">Submit</button>
        </div>
      </form>
    </div>
  </main>
@endsection
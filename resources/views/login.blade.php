@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/authentication.css') }}">
@endsection
@section('title', 'Login')

@section('content')
  <main class="dflex">
    <div id="authContainer">
      <h2>Login</h2>
      @if (session('success'))
      <div class="alert success">
        <span>{{ session('success') }}</span>
      </div>
      @endif

      <form action="/login" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Input email here..." value="{{ old('email') }}">
        @error('email')
        <div class="alert danger">
          <span>{{ $message }}</span>
        </div>
        @enderror

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Input password here...">
        @error('password')
        <div class="alert danger">
          <span>{{ $message }}</span>
        </div>
        @enderror

        <div class="remember">
          <input type="checkbox" name="remember" id="remember">
          <label for="remember">Remember me</label>
        </div>

        @if (session('invalid'))
        <div class="alert danger">
          <span>{{ session('invalid') }}</span>
        </div>
        @endif
        
        <div class="action dflex">
          <a href="/">Back</a>
          <button type="submit">Submit</button>
        </div>
      </form>
    </div>
  </main>
@endsection
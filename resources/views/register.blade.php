@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/authentication.css') }}">
@endsection
@section('title', 'Register')

@section('content')
  <main class="dflex align-center max-vh">
    <div id="authContainer">
      <h2>Register</h2>
      <form action="/register" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Input name here..." value="{{ old('name') }}">
        @error('name')
        <div class="alert danger">
          <span>{{ $message }}</span>
        </div>
        @enderror

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Input email here..." value="{{ old('email', Request::get('e'))}}">
        
        @error('email')
        <div class="alert danger">
          <span>{{ $message }}</span>
        </div>
        @enderror

        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Input username here..." value="{{ old('username') }}">
        @error('username')
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

        <div class="action dflex">
          <a href="/">Back</a>
          <button type="submit">Submit</button>
        </div>
      </form>
    </div>
  </main>
@endsection
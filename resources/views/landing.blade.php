@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endsection
@section('title', 'Sync\'d Notes')

@section('content')
  <header class="dflex max-vh align-center space-between">
    <div class="banner dflex flex-column space-between">
      <div class="title">
        <h2>Manage your Project.</h2>
        <span>Anywhere.</span>
        <span>Anytime.</span>
      </div>
      <div class="desc">
        <span>
          Sync’d Notes aims to help every project management to it’s full extent with a touch of buttons.
        </span>
      </div>
      <div class="signUp">
        <form action="/register" method="post" class="dflex space-between">
          <input type="text" placeholder="Input your e-mail here...">
          <button type="submit">Join Now</button>
        </form>
      </div>
    </div>
    <div class="hero dflex align-center">
      <img src="{{ asset('img/hero.png') }}" alt="Ilustrasi Vector Managing the Project">
    </div>
  </header>
  {{-- <div class="qoute">
    <span class="text">"Lorem Ipsum Dolor Sit Amet"</span>
    <span class="name">-someone famous</span>
  </div> --}}
@endsection
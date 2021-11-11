@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('title', 'Profile')

@section('content')
  <main>
    <div class="container">
      <h2>Hello, username123.</h2>
      <img src="{{ asset('img/default.png') }}" alt="avatar">
      <div class="profile">
        <div>
          <span class="key">Username</span>
          <span class="value">lorem.ipsum</span>
        </div>

        <div>
          <span class="key">Name</span>
          <div class="action">
            <span class="value">Lorem Ipsum Dolor Sit Amet</span>
            <a href="/profile/edit"><i class="far fa-edit"></i></a>
          </div>
        </div>
        
        <div>
          <span class="key">Email</span>
          <span class="value">some.email@mail.co.id</span>
        </div>

        <div>
          <span class="key">Password</span>
          <div class="action">
            <span class="value">********</span>
            <a href="/password/edit"><i class="far fa-edit"></i></a>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
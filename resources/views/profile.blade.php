@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('title', 'Profile')

@section('content')
  <main>
    <div class="container">
      @if (session('success'))
      <div class="alert success">
        {{ session('success') }}
      </div>
      @endif
      <h2>Hello, {{ $user->username }}</h2>
      <img src="{{ asset('img/default.png') }}" alt="avatar">
      <div class="profile">
        <div>
          <span class="key">Username</span>
          <span class="value">{{ $user->username }}</span>
        </div>

        <div>
          <span class="key">Name</span>
          <div class="action">
            <span class="value">{{ $user->name }}</span>
            <a href="/profile/edit"><i class="far fa-edit"></i></a>
          </div>
        </div>
        
        <div>
          <span class="key">Email</span>
          <span class="value">{{ $user->email }}</span>
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
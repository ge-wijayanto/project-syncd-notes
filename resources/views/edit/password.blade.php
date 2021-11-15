@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('title', 'Edit Password')

@section('content')
  <main>
    <div class="container">
      <h2>Change Password</h2>
      <form action="{{ route('password.update') }}" method="post" class="edit-password">
        @method('patch')
        @csrf
        <label for="old-password">Old Password</label>
        <input type="password" id="old-password" name="old_password" placeholder="Input your old password here...">
        @error('old_password')
        <div class="alert danger">
          {{ $message }}
        </div>
        @enderror
        @error('password_incorrect')
        <div class="alert danger">
          {{ $message }}
        </div>
        @enderror

        <label for="new-password">New Password</label>
        <input type="password" id="new-password" name="new_password" placeholder="Input your new password here...">
        @error('new_password')
        <div class="alert danger">
          {{ $message }}
        </div>
        @enderror

        <div class="edit-action dflex">
          <a href="/profile">Back</a>
          <button type="submit">Change</button>
        </div>
      </form>
    </div>
  </main>
@endsection
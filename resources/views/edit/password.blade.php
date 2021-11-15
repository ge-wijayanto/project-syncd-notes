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
        <input type="password" id="old-password" name="old-password" placeholder="Input your old password here...">
        <label for="new-password">New Password</label>
        <input type="password" id="new-password" name="new-password" placeholder="Input your new password here...">

        <div class="edit-action dflex">
          <a href="/profile">Back</a>
          <button type="submit">Change</button>
        </div>
      </form>
    </div>
  </main>
@endsection
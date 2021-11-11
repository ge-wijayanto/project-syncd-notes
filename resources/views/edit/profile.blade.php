@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('title', 'Edit Profile')

@section('content')
  <main>
    <div class="container">
      <h2>Edit Profile</h2>
      <form action="/profile/edit" method="post" class="edit-password" value="Lorem ipsum">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Input your name here...">

        <div class="edit-action dflex">
          <a href="/profile">Back</a>
          <button type="submit">Update</button>
        </div>
      </form>
    </div>
  </main>
@endsection
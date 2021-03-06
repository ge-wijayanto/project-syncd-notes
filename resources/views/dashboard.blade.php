@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('title', 'Dashboard')

@section('content')
  <main>
    <div class="action-project dflex">
      <div class="create">
        <form action="/dashboard/create" method="post">
          @csrf
          <input type="text" id="create" name="name" placeholder="Your new project's name...">
          <button type="submit" class="btn-create">Create</button>
        </form>
      </div>
      <div class="join">
        <form action="/dashboard/join" method="post">
          @csrf
          <input type="text" id="join" name="code" placeholder="Project's code...">
          <button type="submit" class="btn-join">Join</button>
        </form>
      </div>
    </div>
    @if (session('success'))
    <div class="alert success">
      {{ session('success') }}
    </div>
    @endif
    @error('failed')
    <div class="alert danger">
      {{ $message }}
    </div>
    @enderror
    @error('code')
    <div class="alert danger">
      {{ $message }}
    </div>
    @enderror
    @error('name')
    <div class="alert danger">
      {{ $message }}
    </div>
    @enderror
    <div class="projects dflex">
    @foreach($projects as $p)
      <div class="project">
        <a href="project/view/{{$p->id}}">
          <div class="header dflex">
            <span>@php
                $split = explode(" ", $p->name);
                $msg = "";
                foreach ($split as $s) {
                  $msg .= $s[0];
                }
                echo $msg;
            @endphp</span>
          </div>
          <div class="info">
            <span class="name-project">{{$p->name}}</span>
            <span class="created-by">Created by 
              {{ $p->user->name === Auth::user()->name ? 'You' : $p->user->name }}
            </span>
          </div>
        </a>
      </div>
    @endforeach
    </div>
  </main>
@endsection
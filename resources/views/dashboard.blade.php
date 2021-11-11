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
          <input type="text" id="create" name="create" placeholder="Your new project's name...">
          <button type="submit" class="btn-create">Create</button>
        </form>
      </div>
      <div class="join">
        <form action="/dashboard/join" method="post">
          <input type="text" id="join" name="join" placeholder="Project's code...">
          <button type="submit" class="btn-join">Join</button>
        </form>
      </div>
    </div>

    <div class="projects dflex">
      <div class="project">
        <a href="/dashboard/project/1">
          <div class="header dflex">
            <span>UP</span>
          </div>
          <div class="info">
            <span class="name-project">Unknown Project</span>
            <span class="created-by">Created by Anonymous</span>
          </div>
        </a>
      </div>

      <div class="project">
        <a href="/dashboard/project/1">
          <div class="header dflex">
            <span>UP</span>
          </div>
          <div class="info">
            <span class="name-project">Unknown Project</span>
            <span class="created-by">Created by Anonymous</span>
          </div>
        </a>
      </div>

      <div class="project">
        <a href="/dashboard/project/1">
          <div class="header dflex">
            <span>UP</span>
          </div>
          <div class="info">
            <span class="name-project">Unknown Project</span>
            <span class="created-by">Created by Anonymous</span>
          </div>
        </a>
      </div>

      <div class="project">
        <a href="/dashboard/project/1">
          <div class="header dflex">
            <span>UP</span>
          </div>
          <div class="info">
            <span class="name-project">Unknown Project</span>
            <span class="created-by">Created by Anonymous</span>
          </div>
        </a>
      </div>

      <div class="project">
        <a href="/dashboard/project/1">
          <div class="header dflex">
            <span>UP</span>
          </div>
          <div class="info">
            <span class="name-project">Unknown Project</span>
            <span class="created-by">Created by Anonymous</span>
          </div>
        </a>
      </div>
    </div>
  </main>
@endsection
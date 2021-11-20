@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/task.css') }}">
@endsection
@section('title', 'Edit Task')

@section('content')
  <main class="dflex">
    <div class="container">
      <h2>Edit Task</h2>
      <form action="/project/view/{{ $id }}/detail/{{ $idTask }}/update" method="post">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
          <label for="start-date">Start Date</label>
          <input type="date" name="start-date" id="start-date">
        </div>
        <div class="form-group">
          <label for="end-date">End Date</label>
          <input type="date" name="end-date" id="end-date">
        </div>
        <div class="action dflex">
          <a href="/project/view/{{ $id }}/detail/{{ $idTask }}">Back</a>
          <button type="submit" class="btn-create">Update</button>
        </div>
      </form>
    </div>
  </main>
@endsection
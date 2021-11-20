@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/task.css') }}">
@endsection
@section('title', 'Dummy Task')

@section('content')
  <main class="dflex">
    <div class="container">
      <h2>Dummy Task</h2>
      <div class="form-group">
        <label class="bold">Title</label>
        <div class="value">
          Dummy Title
        </div>
      </div>
      <div class="form-group">
        <label class="bold">Description</label>
        <div class="value">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat officia aliquam unde optio voluptate dolore in cupiditate expedita sit, corporis perferendis minima repudiandae? Earum vitae eveniet amet rem quibusdam placeat.
        </div>
      </div>
      <div class="form-group">
        <label class="bold">Start Date</label>
        <div class="value">
          2021-24-24
        </div>
      </div>
      <div class="form-group">
        <label class="bold">End Date</label>
        <div class="value">
          2021-99-99
        </div>
      </div>
      <div class="action dflex martop">
        <a href="/project/view/{{ $id }}">Back</a>
        <a href="/project/view/{{ $id }}/detail/{{ $idTask }}/edit" class="btn-edit">Edit</a>
      </div>
    </div>
  </main>
@endsection
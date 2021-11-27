@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/task.css') }}">
@endsection
@section('title', 'Detail Task')

@section('content')
  <main class="dflex">
    <div class="container">
      <h2>Detail Task</h2>
      @if (session('success'))
      <div class="alert success">
        {{ session('success') }}
      </div>
      @endif
      <div class="form-group">
        <label class="bold">Name</label>
        <div class="value">
          {{ $task->name }}
        </div>
      </div>
      <div class="form-group">
        <label class="bold">Description</label>
        <div class="value">
          {!! nl2br($task->description) !!}
        </div>
      </div>
      <div class="form-group">
        <label class="bold">Start Date</label>
        <div class="value">
          {{ $task->start_date }}
        </div>
      </div>
      <div class="form-group">
        <label class="bold">End Date</label>
        <div class="value">
          {{ $task->end_date }}
        </div>
      </div>
      <div class="action dflex martop">
        <a href="/project/view/{{ $id }}">Back</a>

        @if ($owned)
        <a href="/project/view/{{ $id }}/edit/{{ $idTask }}" class="btn-edit">Edit</a>
        @endif
      </div>
    </div>
  </main>
@endsection
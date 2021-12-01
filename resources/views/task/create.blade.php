@extends('layouts.navbar')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/task.css') }}">
@endsection
@section('title', 'Create Task')

@section('content')
  <main class="dflex">
    <div class="container">
      <h2>Create Task</h2>
      <form action="/project/view/{{ $id }}/create" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        @error('name')
          <div class="alert danger">
            {{ $message }}
          </div>
        @enderror
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
        </div>
        @error('description')
          <div class="alert danger">
            {{ $message }}
          </div>
        @enderror
        <div class="form-group">
          <label for="start_date">Start Date</label>
          <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}">
        </div>
        @error('start_date')
          <div class="alert danger">
            {{ $message }}
          </div>
        @enderror
        <div class="form-group">
          <label for="end_date">End Date</label>
          <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}">
        </div>
        @error('end_date')
          <div class="alert danger">
            {{ $message }}
          </div>
        @enderror
        <div class="action dflex">
          <a href="/project/view/{{ $id }}">Back</a>
          <button type="submit" class="btn-create">Create</button>
        </div>
      </form>
    </div>
  </main>
@endsection
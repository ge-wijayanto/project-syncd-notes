@extends('layouts.navbar')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/forum.css') }}">
@endsection
@section('title')
    {{$projects->name}}
@endsection

@section('content')
    <main>
      <div class="navigation dflex">
        <span>{{$projects->name}}  
        @if (Auth::id() === $projects->user->id)
        : {{$projects->code}}
        @endif
        </span>
        <div class="menu-action">
          <a href="/project/view/{{$projects->id}}">Back</a>
        </div>
      </div>
      <div class="container">
        @foreach ($activitylog as $item)
        <div class="message">
          <span>System ({{$item->created_at}}) : {{$item->description}}</span> 
        </div>
        @endforeach
      </div>
    </main>
@endsection
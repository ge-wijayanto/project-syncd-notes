@extends('layouts.navbar')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/activity.css') }}">
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
        <div class="message">
          <span>System (Jun 10, 2021) :</span> Task "Making Prototype" has been moved to  Finish by Anon251
        </div>
        <div class="message">
          <span>System (Jun 15, 2021) :</span> Task "Impelementation to Program" has been moved to  Finish by Anon123
        </div>
        <div class="message">
          <span>System (Jun 15, 2021) :</span> Task "Impelementation to Program" has been moved to Ongoing by Anon123 
        </div>
      </div>
    </main>
@endsection
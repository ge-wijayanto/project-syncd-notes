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
        @if ($discussion->first())
          @foreach ($discussion as $d)
          <div class="message">
            <span>{{ $d->user->name }} (@php
              $date = new DateTime($d->created_at);
              echo $date->format('M d, Y')
              @endphp) :</span> {{ $d->message }}
          </div>
          @endforeach
        @else
        <div class="message">Start a conversation...</div>
        @endif
      </div>
      <div class="send">
        <form action="/project/view/{{ $projects->id }}/discussion" class="dflex" method="post">
          @csrf
          <input type="text" name="message" id="message" placeholder="Send a message">
          <button type="submit">Send</button>
        </form>
      </div>
    </main>
@endsection
@extends('layouts.navbar')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail_proyek.css') }}">
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
                @if ($checkparticipant !== null || Auth::id() === $projects->user->id) 
                    @if (Auth::id() === $projects->user->id )
                    <a href="/project/view/{{$projects->id}}/create">Create Task</a>
                    @endif
                    <a href="/project/view/{{$projects->id}}/discussion">Discussion</a>
                    <a href="/project/view/{{$projects->id}}/activity">Activity Log</a>
                    @if (Auth::id() === $projects->user->id )
                        <form action="/project/delete/{{$projects->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Terminate Project</button>
                        </form>
                    @endif
                    @if ($checkparticipant !== null) 
                    <form action="/project/view/{{$projects->id}}/leave" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Leave Project</button>
                    </form>
                    @endif
                @endif
            </div>
        </div>

        @if ($ongoings->first())
        <div class="container">
            <h2>Ongoing</h2>
            <hr>
            <div id="ongoings" class="dflex">
                {{-- Template --}}
                @foreach ($ongoings as $ongoing)
                <div class="card dflex">
                    <div class="top">
                        <span class="title">{{ $ongoing->name }}</span>
                        <span class="date">@php
                            $start = new DateTime($ongoing->start_date);
                            $end = new DateTime($ongoing->end_date);
                            echo $start->format('M d'). ' - '. $end->format('M d')
                        @endphp</span>
                    </div>
                    <div class="bottom">
                        <a href="/project/view/{{$projects->id}}/detail/{{ $ongoing->id }}" class="btn-default">Detail</a>
                        <form action="/project/view/{{$projects->id}}/finish/{{ $ongoing->id }}" method="post">
                            @csrf 
                            <button type="submit" class="btn-default">Move to Finish</button>
                        </form>

                        @if (Auth::id() === $projects->user->id)
                        <form action="/project/view/{{$projects->id}}/delete/{{ $ongoing->id }}" method="post">
                            @csrf 
                            @method('delete')
                            <button type="submit" class="btn-danger">Delete</button>
                        </form>
                        @endif
                    </div>
                </div>
                @endforeach
                {{-- End --}}
            </div>
        </div>
        @endif
        
        @if ($finishs->first())
        <div class="container">
            <h2>Finish</h2>
            <hr>
            <div id="finishs" class="dflex">
                {{-- Template --}}
                @foreach ($finishs as $finish)
                <div class="card dflex">
                    <div class="top">
                        <span class="title">{{ $finish->name }}</span>
                        <span class="date">@php
                            $start = new DateTime($finish->start_date);
                            $end = new DateTime($finish->end_date);
                            echo $start->format('M d'). ' - '. $end->format('M d')
                        @endphp</span>
                    </div>
                    <div class="bottom">
                        <a href="/project/view/{{$projects->id}}/detail/{{ $finish->id }}" class="btn-default">Detail</a>
                        <form action="/project/view/{{$projects->id}}/ongoing/{{ $finish->id }}" method="post">
                            @csrf 
                            <button type="submit" class="btn-default">Move to Ongoing</button>
                        </form>

                        @if (Auth::id() === $projects->user->id)
                        <form action="/project/view/{{$projects->id}}/delete/{{ $finish->id }}" method="post">
                            @csrf 
                            @method('delete')
                            <button type="submit" class="btn-danger">Delete</button>
                        </form>
                        @endif
                    </div>
                </div>
                @endforeach
                {{-- End --}}
            </div>
        </div>
        @endif
    </main>
@endsection
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
                    <a href="/project/view/{{$projects->id}}/create">Create Task</a>
                    <a href="#">Activity Log</a>
                    @if (Auth::id() === $projects->user->id )
                        <a href="/project/delete/{{$projects->id}}">Terminate Project</a>
                    @endif
                    @if ($checkparticipant !== null) 
                    <a href="/project/view/{{$projects->id}}/leave">Leave Project</a>
                    @endif
                @endif
            </div>
        </div>
        <div class="container">
            <h2>Ongoing</h2>
            <hr>
            <div id="ongoings" class="dflex">
                {{-- Template --}}
                <div class="card dflex">
                    <div class="top">
                        <span class="title">Making Prototype</span>
                        <span class="date">Jun 10 - Jun 26</span>
                    </div>
                    <div class="bottom">
                        <a href="/project/view/{{$projects->id}}/detail/1" class="btn-default">Detail</a>
                        <a href="" class="btn-default">Move to Finish</a>
                        <a href="/project/view/{{$projects->id}}/delete/1" class="btn-danger">Delete</a>
                    </div>
                </div>
                {{-- End --}}
            </div>
        </div>

        <div class="container">
            <h2>Finish</h2>
            <hr>
            <div id="finishs" class="dflex">
                {{-- Template --}}
                <div class="card dflex">
                    <div class="top">
                        <span class="title">Making Prototype</span>
                        <span class="date">Jun 10 - Jun 26</span>
                    </div>
                    <div class="bottom">
                        <a href="" class="btn-default">Detail</a>
                        <a href="" class="btn-default">Move to Finish</a>
                        <a href="" class="btn-danger">Delete</a>
                    </div>
                </div>
                {{-- End --}}
            </div>
        </div>
    </main>
@endsection
<?php

namespace App\Http\Controllers;

use App\Events\DiscussionEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Participant;
use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function index($id) {
        $projects = Project::find($id);
        $userid = Auth::id();
        $checkparticipant = Participant::where('user_id', $userid)
                    ->where('project_id', $projects->id)
                    ->first();

        $discussion = Discussion::where('project_id', $id)->get();
        return view('discussion', [
            'projects' => $projects, 
            'checkparticipant' => $checkparticipant,
            'discussion' => $discussion,
        ]);
    }

    public function store(Request $request, $id) {
        $request->validate([
            'message' => 'required',
        ]);

        $request->request->add([
            'user_id' => Auth::id(),
            'project_id' => $id,
        ]);

        $data = Discussion::create($request->all());

        $name = Auth::user()->name;
        $date = $data->created_at;
        $message = $data->message;
        event(new DiscussionEvent($id, $name, $date, $message));

        return redirect('/project/view/'. $id. '/discussion');
    }
}

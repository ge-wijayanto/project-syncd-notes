<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function store(Request $request) {
        $this->validate($request,[
            'code' => 'required|max:13'
        ]);

        $code = $request->code;
        $projects = Project::where('code', $code)->first();
        if ($projects === null) {
            return redirect()->back()->withErrors([
                'failed' => 'The project\'s code is invalid!'
            ]);
        }

        $userid = Auth::id();
        if ($projects->user_id === $userid) {
            return redirect()->back()->withErrors([
                'failed' => 'You cannot join the project because you are the project`s owner!'
            ]);
        }

        $check = Participant::where('project_id', $projects->id)
                    ->where('user_id', $userid);

        if ($check->first() !== null) {
            return redirect()->back()->withErrors([
                'failed' => 'You have joined the project'
            ]);
        }

        Participant::create([
            'user_id' => $userid,
            'project_id' => $projects->id
        ]);
        return redirect('/project/view/'.$projects->id);
    }

    public function delete($id) {
        $project = Project::find($id)->id;
        $userid = Auth::id();
        $participant = Participant::where('user_id', $userid)->where('project_id', $project);
        $participant->delete();
        return redirect('dashboard');
    }
}

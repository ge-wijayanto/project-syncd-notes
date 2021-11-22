<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'code' => 'required'
        ]);
        $code = $request->code;
        $projects = Project::where('code', $code)->first();
        $userid = Auth::id();
        Participant::create([
            'user_id' => $userid,
            'project_id' => $projects->id
        ]);
        return redirect('/project/view/'.$projects->id);
    }

    public function delete($id){
        $project = Project::find($id)->id;
        $userid = Auth::id();
        $participant = Participant::where('user_id', $userid)->where('project_id', $project);
        $participant->delete();
        return redirect('dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Participant;
use App\Models\Task;
use App\Models\Discussion;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;

class ProjectController extends Controller
{
    public function view($id)
    {
        $projects = Project::find($id);
        $userid = Auth::id();
        $checkparticipant = Participant::where('user_id', $userid)
                    ->where('project_id', $projects->id)
                    ->first();

        $ongoings = Task::where('project_id', $id)
                    ->where('status', false)
                    ->get();
        
        $finishs = Task::where('project_id', $id)
                    ->where('status', true)
                    ->get();

        return view('proyek.detail', [
            'projects' => $projects, 
            'checkparticipant' => $checkparticipant,
            'ongoings' => $ongoings,
            'finishs' => $finishs,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:30'
        ]);
        Project::create([
            'name' => $request->name,
            'code' => uniqid(),
            'user_id' => Auth::user()->id
        ]);
        return redirect('dashboard')->with('success', 'The project has been created!');
    }

    public function delete($id)
    {
        $projects = Project::find($id);
        $participant = Participant::where('project_id', $projects->id);
        $discussion = Discussion::where('project_id', $projects->id);
        $task = Task::where('project_id', $projects->id);
        $task->delete();
        $discussion->delete();
        $participant->delete();
        $projects->delete();
        
        return redirect('dashboard')->with('success', 'The project has been terminated!');
    }

    public function activity($id) {
        $projects = Project::find($id);
        $userid = Auth::id();
        $checkparticipant = Participant::where('user_id', $userid)
                    ->where('project_id', $projects->id)
                    ->first();
        $activitylog = Activity::where('properties->project_id', $projects->id)->get();
        return view('activity', [
            'projects' => $projects, 
            'checkparticipant' => $checkparticipant,
            'activitylog' => $activitylog
        ]);
    }
}

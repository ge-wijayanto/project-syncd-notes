<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Participant;

class ProjectController extends Controller
{
    public function view($id)
    {
        $projects = Project::find($id);
        $userid = Auth::id();
        $checkparticipant = Participant::where('user_id', $userid)->where('project_id', $projects->id)->first();
        return view('proyek.detail', ['projects' => $projects, 'checkparticipant' => $checkparticipant]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        Project::create([
            'name' => $request->name,
            'code' => uniqid(),
            'user_id' => Auth::user()->id
        ]);
        return redirect('dashboard');
    }

    public function delete($id)
    {
        $projects = Project::find($id);
        $projects->delete();
        return redirect('dashboard');
    }
}

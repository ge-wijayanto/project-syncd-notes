<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create($id) {
        return view('task.create', [
            'id' => $id
        ]);
    }

    public function store(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:20',
            'description' => 'required|max:200',
            'start_date' => 'required|after_or_equal:'.date('m/d/Y'),
            'end_date' => 'required|after_or_equal:start_date'
        ]);
        $user = Auth::user();
        $request->request->add([
            'project_id' => $id,
        ]);

        $task = Task::create($request->all());

        if($task) {
            activity()
                ->on($task)
                ->by($user)
                ->withProperties(['project_id' => $id])
                ->log('Task "' . $task->name . '" was created by ' . Auth::user()->name);
        }

        return redirect('project/view/'. $id);
    }

    public function detail($id, $idTask) {
        $project = Project::find($id);
        if (!$project) {
            return redirect('dashboard');
        }

        $owned = $project->user_id === Auth::id();
        $task = Task::find($idTask);

        return view('task.detail', [
            'id' => $id,
            'idTask' => $idTask,
            'owned' => $owned,
            'task' => $task
        ]);
    }

    public function edit($id, $idTask) {
        $task = Task::find($idTask);

        return view('task.edit', [
            'id' => $id,
            'idTask' => $idTask,
            'task' => $task,
        ]);
    }

    public function update(Request $request, $id, $idTask) {
        $validate = $request->validate([
            'name' => 'required|max:20',
            'description' => 'required|max:200',
            'start_date' => 'required|after_or_equal:'.date('m/d/Y'),
            'end_date' => 'required|after_or_equal:start_date'
        ]);
        $user = Auth::user();
        $task = Task::find($idTask);
        $task->update($validate);

        if($task) {
        activity()
            ->on($task)
            ->by($user)
            ->withProperties(['project_id' => $id])
            ->log('Task "' . $task->name . '" was edited by ' . Auth::user()->name);
        }

        return redirect('project/view/'. $id. '/detail/'. $idTask)->with('success', 'Task has been updated!');
    }

    public function delete($id, $idTask) {
        $task = Task::find($idTask);
        $user = Auth::user();

        $task->delete();

        activity()
            ->on($task)
            ->by($user)
            ->withProperties(['project_id' => $id])
            ->log('Task "' . $task->name . '" was deleted by ' . Auth::user()->name);

        return redirect('project/view/'. $id);
    }

    public function ongoing($id, $idTask) {
        $task = Task::find($idTask);
        $user = Auth::user();
        $task->update([
            'status' => false
        ]);

        if($task) {
            activity()
            ->on($task)
            ->by($user)
            ->withProperties(['project_id' => $id])
            ->log('Task "' . $task->name . '" was moved to Ongoing by ' . Auth::user()->name);
        }

        return redirect('project/view/'. $id);
    }

    public function finish($id, $idTask) {
        $task = Task::find($idTask);
        $user = Auth::user();
        $task->update([
            'status' => true
        ]);

        if($task) {
            activity()
            ->on($task)
            ->by($user)
            ->withProperties(['project_id' => $id])
            ->log('Task "' . $task->name . '" was moved to Finished by ' . Auth::user()->name);
        }
        return redirect('project/view/'. $id);
    }
}
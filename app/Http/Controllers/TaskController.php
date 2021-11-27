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
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $request->request->add([
            'project_id' => $id,
        ]);

        Task::create($request->all());

        return redirect('project/view/'. $id);
    }

    public function detail($id, $idTask) {
        $project = Project::find($id);
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
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        Task::find($idTask)->update($validate);

        return redirect('project/view/'. $id. '/detail/'. $idTask)->with('success', 'Task has been updated!');
    }

    public function delete($id, $idTask) {
        $task = Task::find($idTask);
        $task->delete();

        return redirect('project/view/'. $id);
    }

    public function ongoing($id, $idTask) {
        Task::find($idTask)->update([
            'status' => false
        ]);

        return redirect('project/view/'. $id);
    }

    public function finish($id, $idTask) {
        Task::find($idTask)->update([
            'status' => true
        ]);

        return redirect('project/view/'. $id);
    }
}
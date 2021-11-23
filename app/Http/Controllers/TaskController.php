<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create($id) {
        return view('task.create', ['id' => $id]);
    }

    public function save() {
        $model = new Task();
        $this->validate($request,[
            'name' => 'required'
        ]);

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'project_id' => uniqid(),
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
        $model->saveTask($data);

        return redirect('dashboard');
    }

    public function edit($id, $idTask) {
        return view('task.edit', [
            'id' => $id,
            'idTask' => $idTask
        ]);
    }

    public function detail($id, $idTask) {
        return view('task.detail', [
            'id' => $id,
            'idTask' => $idTask
        ]);
    }
}
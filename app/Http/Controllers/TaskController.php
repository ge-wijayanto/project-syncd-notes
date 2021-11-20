<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create($id) {
        return view('task.create', ['id' => $id]);
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

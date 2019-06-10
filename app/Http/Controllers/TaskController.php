<?php

namespace App\Http\Controllers;

use App\Task;
use App\Label;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->tasks()->get();
    }

    public function show(Task $task)
    {
        return $task->load('labels');
    }

    public function store(Request $request)
    {
        $task = $request->user()->tasks()->create($request->all());

        return response()->json($task, 201);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return response()->json($task, 200);
    }

    public function delete(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }

    public function addLabel(Request $request, Task $task, Label $label) 
    {
        $task->labels()->attach($label);

        return response()->json($task->load('labels'), 200);
    }


    public function removeLabel(Request $request, Task $task, Label $label) 
    {
        $task->labels()->detach($label);

        return response()->json($task->load('labels'), 200);
    }
}

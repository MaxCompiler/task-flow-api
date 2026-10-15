<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request, Project $project){
        $task = $project->task()->create($request->validated());

        return response()->json([
            'message'=>'Tarea creada exitosamente',
            'task'=> $task
        ],201);
    }

    public function update(Request $request, Task $task){
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|required|in:pending,in_progress,completed',
        ]);

        $task->update($validated);

        return response()->json([
            'message'=>'Tarea actualizada correctamente',
            'task'=> $task
        ]);
    }

    public function destroy(Task $task){
        $task->delete();

        return response()->json([
            'message'=> 'Tarea eliminada correctamente'
        ]);
    }
}

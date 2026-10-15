<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){
        return response()->json($request->user()->projects()->with('task')->get());
    }

    public function store(StoreProjectRequest $request){
        $project = $request->user()->projects()->create($request->validated());

        return response()->json([
            'message'=>'Proyecto creado corectamente',
            'project'=> $project
        ],201);
    }

    public function show(Project $project){
        return response()->json($project->load('Task'));
    }

    public function update(Request $request, Project $project){
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update($validated);

        return response()->json([
            'message' => 'Proyecto actualizado',
            'project' => $project
        ]);
    }

    public function destroy(Project $project){
        $project->delete();

        return response()->json([
            'message'=> 'Proyecto Eliminado exitosamente'
        ]);

    }
}

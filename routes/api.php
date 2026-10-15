<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

Route::post('register', [AuthController::class , 'register']);
Route::post('login', [AuthController::class , 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout',[AuthController::class, 'logout']);

    Route::apiResource('projects', ProjectController::class);
    Route::post('projects/{project}/task', [TaskController::class, 'store']);
    Route::match(['put', 'patch'],'tasks/{task}', [TaskController::class, 'update']);
    Route::delete('tasks/{task}',[TaskController::class , 'destroy']);
});


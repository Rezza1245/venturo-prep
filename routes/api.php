<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskApiController;

Route::get('/test', function(){
    return response()->json([
        'message'=>'API Works'
    ]);
});

Route::get('/tasks', [TaskApiController::class, 'index']);
Route::get('/tasks/{task}', [TaskApiController::class, 'show']);
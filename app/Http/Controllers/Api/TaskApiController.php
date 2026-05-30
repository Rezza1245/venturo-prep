<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResource;

class TaskApiController extends Controller
{
    public function index(){
        return TaskResource::collection(
            Task::all()
        );
    }
    public function show(Task $task){
        return new TaskResource($task);
    }
    //
}

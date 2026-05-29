<?php
namespace App\Services;
use App\Models\Task;

class TaskService
{
    public function toggle(Task $task)
    {
        $task->update([
            'is_completed' => !$task->is_completed
        ]);
    }
}
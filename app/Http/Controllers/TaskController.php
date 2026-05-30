<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Task::ownedBy(auth()->id());
        if ($request->search) {
            $query->search($request->search);
        }

        if ($request->status == 'completed') {
            $query->completed();
        }

        if ($request->status == 'pending') {
            $query->pending();
        }

        $tasks = $query->with('user')->latest()->paginate(5);

        return view('tasks.index', compact('tasks'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        Task::create([
            ...$data,
            'user_id' => auth()->id(),
            'is_completed' => false
        ]);
        return redirect('/tasks')->with('success', 'Task Berhasil Dibuat');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        Gate::authorize('update', $task);

        return view('tasks.edit', compact('task'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        Gate::authorize('update', $task);

        $task->update([
            'title' => $request->title
        ]);
        return redirect('/tasks')->with('success', 'Task Berhasil Diupdate');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);

        $task->delete();

        return redirect('/tasks')->with('success', 'Task Berhasil Dihapus');
        //
    }

    public function toggle(Task $task)
    {

        Gate::authorize('toggle', $task);

        $service = new TaskService();
        $service->toggle($task);

        return redirect('/tasks')->with('success', 'Task Berhasil Diupdate');
    }
}

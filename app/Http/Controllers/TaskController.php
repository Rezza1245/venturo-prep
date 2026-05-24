<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Task::where('user_id', auth()->id());
        if ($request->search){
            $query->where(
                'title',
                'like',
                '%'. $request->search . '%'
            );
        }

        if($request->status == 'completed'){
            $querry->where('is_completed', true);
        }

        $tasks = $query->latest()->get();
        
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
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:3'
        ]);
        Task::create([
            'title' => $request->title,
            'user_id' => auth()->id(),
            'is_complited' => false
        ]);
        return redirect('/tasks');
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
        if($task->user_id !== auth()->id()){
            abort(403);
        }
        return view('tasks.edit', compact('task'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== auth()->id()){
            abort(403);
        }
        $request->validate([
            'title'=>'required|min:3'
        ]) ;
        $task->update([
            'title' => $request->title
        ]);
        return redirect('/tasks');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()){
            abort(403);
        }
        $task->delete();
        
        return redirect('/tasks');
        //
    }

    public function toggle(Task $task)
    {
        if ($task->user_id !== auth()->id()){
            abort(403);
        }
        $task->update([
            'is_completed' => !$task->is_completed
        ]);
        return redirect('/tasks');
    }
}

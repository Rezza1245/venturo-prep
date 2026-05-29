@extends('layouts.app')
@if(session('success'))
    <div style="padding:10px;background:#d1fae5;margin-bottom:10px;">
        {{ session('success') }}
    </div>
@endif
@section('content')

    <h1>Todo List</h1>

    <a href="/tasks/create">
        Add Task
    </a>

    <form action="/tasks" method="GET">
        <input 
            type="text",
            name="search",
            placeholder="Search Task",
            value="{{ request('search') }}"
        >

        <select name="status">
            <option value="">
                All
            </option>

            <option value="completed" {{ request('status')=='completed'?'selected':'' }}>
                Completed
            </option>

            <option value="pending" {{ request('status')=='pending'?'selected':'' }}>
                Pending
            </option>
        </select>

        <button type="submit">
            Filter
        </button>
    </form>
    
    @foreach ($tasks as $task)
        <div>
            @if($task->is_completed)
                <p>
                    <s>{{ $task->title }}</s>
                </p>
            @else
                <p>
                    {{ $task->title }}
                </p>
            @endif

            <a href="/tasks/{{ $task->id }}/edit">
                Edit
            </a>

            <form action="/tasks/{{ $task->id }}/toggle" method="POST">
                @csrf
                @method('PATCH')

                <button type="submit">
                    @if ($task->is_completed)
                        Undo
                    @else
                        Completed
                    @endif
                </button>

            </form>
            <form action="/tasks/{{ $task->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">
                    Delete
                </button>
            </form>
        </div>
    @endforeach
    {{ $tasks->links() }}

@endsection
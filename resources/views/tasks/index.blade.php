@extends('layouts.app')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
@section('content')

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Todo List
        </h1>

        <a href="/tasks/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Add Task
        </a>

    </div>

    <form action="/tasks" method="GET" class="mb-6 flex gap-3">

        <input type="text" name="search" placeholder="Search Task" value="{{ request('search') }}"
            class="border rounded px-3 py-2 w-full">

        <select name="status" class="border rounded px-3 py-2">
            <option value="">All</option>

            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>
                Completed
            </option>

            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
                Pending
            </option>
        </select>

        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded">
            Filter
        </button>

    </form>

    @foreach ($tasks as $task)
        <div class="bg-white rounded shadow p-4 mb-4>
                           @if($task->is_completed)
                                            <h3 class=" text-lg font-semibold text-gray-400">
                            <s>{{ $task->title }}</s>
                            </h3>
                        @else
                <h3 class="text-lg font-semibold">
                    {{ $task->title }}
                </h3>
            @endif

            <a href="/tasks/{{ $task->id }}/edit" class="bg-yellow-500 text-white px-3 py-1 rounded">
                Edit
            </a>

            <form action="/tasks/{{ $task->id }}/toggle" method="POST">
                @csrf
                @method('PATCH')

                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">
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
                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded>
                    Delete
                </button>
            </form>
        </div>
    @endforeach
    {{ $tasks->links() }}

@endsection
<h1>Todo List</h1>
<a href="/tasks/create">Add Task</a>


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

        <a href="/tasks/{{ $task->id }}/edit">Edit</a>

        <form action="/tasks/{{ $task->id }}/toggle" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit">
                @if($task->is_completed)
                    undo
                @else
                    complete
                @endif
            </button>
        </form>

        <form action="/tasks/{{$task->id}}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">
                Delete
            </button>
        </form>
    </div>
@endforeach
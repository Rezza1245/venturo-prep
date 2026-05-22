<h1>Todo List</h1>
<a href="/tasks/create">Add Task</a>

@foreach ($tasks as $task)
    <p>
    {{$task->title}}
    </p>

    <form action="/tasks/{{$task->id}}" method = "POST">
        @csrf
        @method('DELETE')

        <button type="submit">
            Delete
        </button>
    </form>
@endforeach
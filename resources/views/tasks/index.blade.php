<h1>Todo List</h1>
<a href="/tasks/create">Add Task</a>

@foreach ($tasks as $task)
    <p>{{$task->title}}</p>
@endforeach
<h1>Edit Task</h1>
<form action="/tasks/{{$task->id}}" method="POST">
    @csrf
    @method('PUT')
    <input 
        type="text",
        name="title",
        value="{{ $task->title }}"
    >

    <button type="submit">
        Update
    </button>
</form>
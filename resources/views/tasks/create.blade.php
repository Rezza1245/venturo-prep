<h1>Create Task</h1>
<form action="/tasks" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Task title">
    <button type="submit">
        Save
    </button>
</form>
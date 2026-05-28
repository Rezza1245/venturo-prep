@extends('layouts.app')
@section('content')

<h1>Create Task</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/tasks" method="POST">
    @csrf
    <input 
        type="text",
        name="title",
        placeholder="Task title"
    >

    <button type="submit">
        Save
    </button>
    
</form>
@endsection
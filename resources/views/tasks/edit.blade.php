@extends('layouts.app')
@section('content')

<h1>Edit Task</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/tasks/{{ $task->id }}" method="post">
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

@endsection
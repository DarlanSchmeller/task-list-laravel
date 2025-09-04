@extends('layouts.app')

@section('title', $task->title)

@section('content')
<p>{{ $task->description }}</p>

@if ($task->long_description)
<p>{{ $task->long_description }}</p>
@endif

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>

<button class="bg-blue-500 hover:bg-blue-600 text-sm text-white p-2">
    <a href="{{ route('tasks.edit', $task->id) }}">Edit Task</a>
</button>
@endsection
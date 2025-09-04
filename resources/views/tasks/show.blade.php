@extends('layouts.app')

@section('title', $task->title)

@section('content')
<p>{{ $task->description }}</p>

@if ($task->long_description)
<p>{{ $task->long_description }}</p>
@endif

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>

<div class="flex flex-row gap-4 my-4">
    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
        class="bg-blue-500 hover:bg-blue-600 text-sm text-white p-2 rounded-md">
        Edit Task
    </a>

    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
        @csrf
        @method('DELETE')
        <button class="bg-red-500 hover:bg-red-600 text-sm text-white p-2 rounded-md">
            Delete Task
        </button>
    </form>
</div>
@endsection
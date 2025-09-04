@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    @forelse ($tasks as $index => $task)
        <div>
            {{ $index + 1}}.
            <a href="{{ route('tasks.show', ['id' => $task->id]) }}">
                {{ $task->title }}
            </a>
        </div>
    @empty
        <div>There are no tasks</div>
    @endforelse

    <button class="bg-blue-500 hover:bg-blue-600 text-sm text-white p-2">
        <a href="{{ route('tasks.create') }}">Create New Task</a>
    </button>
@endsection

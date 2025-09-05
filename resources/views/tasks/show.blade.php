@extends('layouts.app')

@section('title', $task->title)

@section('content')
<div class="flex flex-row gap-4">
    <div>
        <x-task-card :task="$task" />

        <div class="flex flex-row gap-4 my-4">
            <form method="POST" action="{{ route('tasks.update-status', $task->id) }}">
                @csrf
                @method("PUT")
                <button type="submit"
                    class="px-4 py-2 rounded-lg text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    Mark as Done
                </button>
            </form>

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
    </div>
</div>
@endsection
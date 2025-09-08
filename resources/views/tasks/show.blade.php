@extends('layouts.app')

@section('title', $task->title)

@section('content')

<div class="flex md:flex-row flex-col md:gap-4 gap-8 my-4 items-stretch">
    <div class="rounded-xl shadow-lg bg-white overflow-hidden flex flex-col h-full w-full flex-1">
        <div class="p-5 flex-1">
            <div class="flex items-center mb-4 text-xl">
                <i class="flex-shrink-0 fa {{ config('task.icons')[strtolower($task->type)] }} text-white bg-indigo-600 rounded-lg shadow-md mr-3 
                    w-11 h-11 flex items-center justify-center"></i>
                <h2 class="text-lg font-bold text-gray-800">
                    {{ $task->title }}
                </h2>
            </div>

            <div class="space-y-2 text-sm text-gray-600">
                <p><strong>Description:</strong> {{ $task->description }}</p>
                <p>
                    <strong>Status:</strong>
                    <span
                        class="text-xs font-semibold {{ config('task.statusColors')[strtolower($task->status)] }} text-white rounded-full px-3 py-1 ml-1">{{
                        ucfirst($task->status) }}</span>
                </p>
                <p><strong>Assignee:</strong> {{ $task->assignee }}</p>
                <p><strong>Priority:</strong>
                    <span
                        class="text-xs font-semibold {{ config('task.priorityColors')[strtolower($task->priority)] }} text-white rounded-full px-3 py-1 ml-1">
                        {{ ucfirst($task->priority) }}
                    </span>
                </p>
                <p><strong>Created at:</strong> {{ $task->created_at->format('M d, Y H:i') }}</p>
            </div>

            {{-- Checklist --}}
            <h3 class="text-md font-bold text-gray-800 pb-2 mt-8">Checklist</h2>

                <ul class="space-y-2">
                    @foreach($checklist as $item)
                    <li class="flex items-center space-x-3 bg-gray-50 rounded-xl p-3 shadow-sm">
                        <input type="checkbox" class="h-5 w-5 text-green-600 rounded focus:ring-green-500" {{
                            $item->completed ? 'checked' : '' }}
                        disabled
                        >
                        <span class="{{ $item->completed ? 'line-through text-gray-400' : '' }}">
                            {{ $item->description }}
                        </span>
                    </li>
                    @endforeach
                </ul>

            <div class="flex items-center bg-gray-50 rounded-xl p-3 shadow-sm mt-2">
                <a href="{{ route('tasks.edit', $task->id) }}">
                    <i class="fa fa-add mr-4"></i> Add new item
                </a>
            </div>
        </div>
    </div>


    <div class="bg-white rounded-xl shadow-lg p-6 md:w-1/3 w-full flex flex-col gap-5">
        <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-2">Manage Task</h3>

        {{-- Update Status --}}
        <div class="flex flex-col gap-1">
            <span class="text-gray-600 text-sm">Change the task status:</span>
            <form method="POST" action="{{ route('tasks.update-status', $task->id) }}">
                @csrf
                @method("PUT")
                <button type="submit"
                    class="w-full px-4 py-2 rounded-lg text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    Mark as {{ config('task.nextStatus')[strtolower($task->status)] }}
                </button>
            </form>
        </div>

        {{-- Edit Task --}}
        <div class="flex flex-col gap-1">
            <span class="text-gray-600 text-sm">Edit the task details:</span>
            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                class="w-full text-center px-4 py-2 rounded-lg text-sm font-medium text-indigo-600 bg-indigo-100 hover:bg-indigo-200>
                class="px-4 py-2 rounded-lg text-sm font-medium text-indigo-600 bg-indigo-100 hover:bg-indigo-200">
                Edit Task
            </a>
        </div>

        {{-- Delete Task --}}
        <div class="flex flex-col gap-1 mt-6">
            <span class="text-gray-600 text-sm">Delete this task permanently:</span>
            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="w-full px-4 py-2 rounded-lg text-sm font-medium text-white bg-red-500 hover:bg-red-600 transition">
                    Delete Task
                </button>
            </form>
        </div>
    </div>
</div>

<a href="{{ route('tasks.index') }}" 
class="flex items-center justify-center p-3 mt-6 mb-6 bg-white border border-gray-300 text-gray-600 hover:bg-gray-50 rounded-lg font-medium">
    Return to tasks
</a>
@endsection
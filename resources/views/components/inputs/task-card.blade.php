@props(['task' => ''])

@php
    $priorityColors = [
        'low' => 'bg-blue-500',
        'medium' => 'bg-orange-500',
        'high' => 'bg-red-500'
    ];

    $statusColors = [
        'to do' => 'bg-gray-500',
        'in progress' => 'bg-cyan-500',
        'completed' => 'bg-green-500'
    ];

    $taskNextStatus = [
        'to do' => 'in progress',
        'in progress' => 'completed',
        'completed' => 'to do',
    ];
@endphp

<div class="rounded-xl shadow-lg bg-white overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
    <div class="p-5 flex-1">
        <div class="flex items-center mb-4">
            <i class="fa fa-clipboard-check text-lg text-white bg-indigo-600 p-3 rounded-lg shadow-md mr-3"></i>
            <h2 class="text-lg font-bold text-gray-800">
                {{ $task->title }}
            </h2>
        </div>

        <div class="space-y-2 text-sm text-gray-600">
            <p><strong>Description:</strong> {{ $task->description }}</p>
            <p>
                <strong>Status:</strong>
                <span class="text-xs font-semibold {{ $statusColors[strtolower($task->status)] }} text-white rounded-full px-3 py-1 ml-1">{{ ucfirst($task->status) }}</span>
            </p>
            <p><strong>Assignee:</strong> {{ $task->assignee }}</p>
            <p><strong>Priority:</strong> 
                <span class="text-xs font-semibold {{ $priorityColors[$task->priority] }} text-white rounded-full px-3 py-1 ml-1">
                    {{ ucfirst($task->priority) }}
                </span>
            </p>
            <p><strong>Created at:</strong> {{ $task->created_at }} 
        </div>
    </div>

    <div class="flex flex-row justify-end gap-4 p-5 mt-auto">
        <a href="{{ route('tasks.show', $task->id) }}"
           class="px-4 py-2 rounded-lg text-sm font-medium text-indigo-600 bg-indigo-100 hover:bg-indigo-200">
           Details
        </a>
        <form method="POST" action="{{ route('tasks.update-status', $task->id) }}">
            @csrf
            @method("PUT")
            <button type="submit" class="px-4 py-2 rounded-lg text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                Mark as {{ $taskNextStatus[strtolower($task->status)] }}
            </button>
        </form>
    </div>
</div>

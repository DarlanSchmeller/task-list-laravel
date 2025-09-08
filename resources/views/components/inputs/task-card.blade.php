@props(['task' => ''])

<div class="rounded-xl shadow-lg bg-white overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
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
                <span class="text-xs font-semibold {{ config('task.statusColors')[strtolower($task->status)] }} text-white rounded-full px-3 py-1 ml-1">{{ ucfirst($task->status) }}</span>
            </p>
            <p><strong>Assignee:</strong> {{ $task->assignee }}</p>
            <p><strong>Priority:</strong> 
                <span class="text-xs font-semibold {{ config('task.priorityColors')[strtolower($task->priority)] }} text-white rounded-full px-3 py-1 ml-1">
                    {{ ucfirst($task->priority) }}
                </span>
            </p>
            <p><strong>Created at:</strong> {{ $task->created_at->format('M d, Y H:i') }}</p>
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
                Mark as {{ config('task.nextStatus')[strtolower($task->status)] }}
            </button>
        </form>
    </div>
</div>

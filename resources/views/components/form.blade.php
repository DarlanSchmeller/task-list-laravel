@props(['route', 'task' => [], 'checklists' => [], 'method' => ''])

<form method="POST" action="{{ $task ? route($route, $task) : route($route) }}" enctype="multipart/form-data">
    @csrf
    @if($method)
    @method($method)
    @endif

    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
        Task Info
    </h2>

    <x-inputs.text name="title" id="title" placeholder="Insert a title for your task" label="Title" :data="$task" />

    <x-inputs.text-area name="description" id="description" placeholder="Insert a description for your task"
        label="Description" :data="$task" />

    <x-inputs.text-area name="detailed_description" id="detailed_description"
        placeholder="Insert a detailed description for your task" label="Long Description" :data="$task" />

    <x-inputs.text name="assignee" id="assignee" placeholder="Insert an assignee for your task" label="Assignee"
        :data="$task" />

    <x-inputs.select id="priority" name="priority" label="Priority" value="{{ old('priority', $task->priority ?? '') }}" :options="[
            'low' => 'low',
            'medium' => 'medium',
            'high' => 'high',
        ]" />

    <x-inputs.select id="status" name="status" label="Status" value="{{ old('status', $task->status ?? '') }}" :options="[
            'to do' => 'to do',
            'in progress' => 'in progress',
            'completed' => 'completed',
        ]" />

    <x-inputs.select id="type" name="type" label="Type" value="{{ old('type', $task->type ?? '') }}" :options="[
        'software' => 'software',
        'cooking' => 'cooking',
        'home' => 'home',
        'shopping' => 'shopping',
        'exercise' => 'exercise',
        'study' => 'study',
        'meeting' => 'meeting',
        'finance' => 'finance',
        'travel' => 'travel',
        'health' => 'health',
        'gardening' => 'gardening',
        'cleaning' => 'cleaning',
        'entertainment' => 'entertainment'
    ]" />

    <div class="mb-4">
        <label class="block text-sm font-bold text-gray-700 pt-4">Checklist</label>

        @for($i = 0; $i < 3; $i++)
            <input type="text" name="checklists[]" 
                placeholder="Checklist item {{ $i + 1 }}" 
                class="w-full p-2 border rounded my-2"
                value="{{ old('checklists.' . $i, $checklists[$i] ?? '') }}">
        @endfor
    </div>


    <button type="submit"
        class="w-full bg-indigo-500 hover:bg-indigo-600 text-white p-3 my-3 rounded focus:outline-none font-bold">
        {{ $method == 'PUT' ? 'Edit Task' : 'Add Task'}}
    </button>
</form>
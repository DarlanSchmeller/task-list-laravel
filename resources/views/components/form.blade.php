@props(['route', 'task' => [], 'method' => ''])

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

    <x-inputs.text-area name="long_description" id="long_description"
        placeholder="Insert a long description for your task" label="Long Description" :data="$task" />

    <button type="submit"
        class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
        {{ $method == 'PUT' ? 'Edit Task' : 'Add Task'}}
    </button>
</form>
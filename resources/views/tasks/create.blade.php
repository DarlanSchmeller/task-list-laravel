@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">
        Create New Task
    </h2>
    <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
            Task Info
        </h2>

        <div class="mb-4">
            <label class="block text-gray-700" for="title">Title*</label>
            <input text="text" name="title" id="title" class="w-full px-4 py-2 border rounded focus:outline-none"
            value="{{ old('title') }}"   placeholder="Task title" />
            @error('title')
            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="description">Description*</label>
            <textarea name="description" id="description" class="w-full px-4 py-2 border rounded focus:outline-none"
                rows="1" placeholder="Task description">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="long_description">Long Description*</label>
            <textarea name="long_description" id="long_description"
                class="w-full px-4 py-2 border rounded focus:outline-none" rows="3"
                placeholder="Task detailed description">{{ old('long_description') }}</textarea>
            @error('long_description')
            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
            Add Task
        </button>
    </form>
</div>
@endsection
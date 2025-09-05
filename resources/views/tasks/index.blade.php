@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @forelse ($tasks as $index => $task)
            <div class="rounded-lg shadow-md bg-white p-4">
                <div class="flex items-center space-between gap-4">
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="text-blue-700">
                        {{ $task->title }}
                    </a>
                </div>
            </div>
        @empty
            <div>There are no tasks</div>
        @endforelse
    </div>

    @if ($tasks->count())
        <nav class="pt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection

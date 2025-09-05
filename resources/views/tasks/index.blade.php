@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    @forelse ($tasks as $index => $task)
    <x-task-card :task="$task" />

    @empty
    <div class="p-4 mb-4 text-sm text-white rounded bg-gray-500">
        <p>No Tasks Found</p>
    </div>
    @endforelse
</div>

@if ($tasks->count())
<nav class="pt-4">
    {{ $tasks->links() }}
</nav>
@endif
@endsection
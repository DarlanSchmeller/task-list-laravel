@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">
        Edit Task
    </h2>

    <x-form method="PUT" route="tasks.update" :task="$task" />
</div>
@endsection
@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
    <h2 class="text-4xl text-center font-bold mb-4">
        Create New Task
    </h2>

    <x-form route="tasks.store" />
</div>
@endsection
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('tasks.index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::get('/tasks/create', function () {
    return view('tasks.create');
})->name('tasks.create');

Route::post('/tasks/', function (Request $request) {
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'long_description' => 'required|string|max:525'
    ]);

    $taskId = Task::create($validatedData)->id;

    return redirect()->route('tasks.show', [
        'id' => $taskId
    ])->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::get('/tasks/{id}', function ($id) {
    return view('tasks.show', [
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.show');

Route::get('/tasks/{id}/edit', function ($id) {
    return view('tasks.edit', [
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.edit');

Route::put('/tasks/{id}', function ($id, Request $request) {
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'long_description' => 'required|string|max:525'
    ]);

    $task = Task::findOrFail($id);
    $task->update($validatedData);


    return redirect()->route('tasks.show', [
        'id' => $id
    ])->with('success', 'Task updated successfully!');
})->name('tasks.update');

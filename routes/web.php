<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('tasks.index', [
        'tasks' => Task::latest()->paginate(6)
    ]);
})->name('tasks.index');

Route::get('/tasks/create', function () {
    return view('tasks.create');
})->name('tasks.create');

Route::post('/tasks/', function (TaskRequest $request) {
    $validatedData = $request->validated();

    $taskId = Task::create($validatedData)->id;

    return redirect()->route('tasks.show', [
        'task' => $taskId
    ])->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::get('/tasks/{task}', function (Task $task) {
    return view('tasks.show', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('tasks.edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::put('/tasks/{task}', function (TaskRequest $request, Task $task) {
    $validatedData =  $request->validated();

    $task->update($validatedData);

    return redirect()->route('tasks.show', ['task' =>$task->id])->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');


Route::put('/tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->route('tasks.show', $task->id)->with('success', 'Task status changed successfully!');
})->name('tasks.toggle-complete');
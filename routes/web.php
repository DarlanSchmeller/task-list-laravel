<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::get('/tasks/create', function () {
    return view('create');
})->name('tasks.create');

Route::post('/tasks/', function (Request $request) {
    dd('We have reached the store route', $request->all());
})->name('tasks.store');

Route::get('/tasks/{id}', function ($id) {
    return view('show', [
      'task' => Task::findOrFail($id)
    ]);
})->name('tasks.show');
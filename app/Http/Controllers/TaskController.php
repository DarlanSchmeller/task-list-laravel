<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Task $task): View
    {
        return view('tasks.index', [
            'tasks' => Task::latest()->paginate(6)
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function getCompleted(Task $task): View
    {
        return view('tasks.index', [
            'tasks' => Task::latest()->where('status', 'completed')->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $taskId = Task::create($validatedData)->id;

        return redirect()->route('tasks.show', [
            'task' => $taskId
        ])->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): View
    {
        // Get checklist items
        $checklist = $task->checklistItems;

        return view('tasks.show', ['task' => $task, 'checklist' => $checklist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $validatedData =  $request->validated();

        $task->update($validatedData);

        return redirect()->route('tasks.show', ['task' =>$task->id])->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');

    }

    /**
     * Toggle the status of a task
     */
    public function updateStatus(Task $task)
    {
        $task->updateStatus();

        return redirect()->route('tasks.show', $task->id)->with('success', 'Task status changed successfully!');
    }
}

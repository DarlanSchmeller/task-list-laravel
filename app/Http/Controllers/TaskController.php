<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\ChecklistItem;
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

        $checklists = $validatedData['checklists'] ?? [];
        unset($validatedData['checklists']);

        $task = Task::create($validatedData);

        foreach ($checklists as $item) {
            if (is_string($item)) {
                $task->checklistItems()->create([
                    'description' => $item,
                    'completed' => false,
                ]);
            }
        }

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
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
     * Update checkmark
     */
    public function toggleChecklist(Task $task, ChecklistItem $item): RedirectResponse
    {
        // Make sure the item belongs to the task
        if ($item->task_id !== $task->id) {
            abort(403);
        }

        // Toggle completed
        $item->completed = !$item->completed;
        $item->save();

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        // Get checklist data
        $checklistItems = $task->checklistItems->pluck('description')->toArray();
        $checklistItems = !empty($checklistItems) ? $checklistItems : null;
        
        return view('tasks.edit', [
            'task' => $task,
            'checklistItems' => $checklistItems
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $validatedData = $request->validated();

        $checklists = $validatedData['checklists'] ?? [];
        unset($validatedData['checklists']);

        $task->update($validatedData);
        $task->checklistItems()->delete();

        foreach ($checklists as $item) {
            if (is_string($item)) {
                $task->checklistItems()->create([
                    'description' => $item,
                    'completed' => false,
                ]);
            }
        }

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

        return redirect()->back()->with('success', 'Task status changed successfully!');
    }
}

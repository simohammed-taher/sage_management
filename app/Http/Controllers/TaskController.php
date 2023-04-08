<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();
        return
        view('tasks.create', compact('projects'));
    }
public function store(Request $request)
{
    $request->validate([
        'project_id' => 'required|integer',
        'name' => 'required',
        'due_date' => 'required|date',
    ]);

    Task::create($request->all());
    return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
}

public function edit(Task $task)
{
    $projects = Project::all();
    return view('tasks.edit', compact('task', 'projects'));
}

public function update(Request $request, Task $task)
{
    $request->validate([
        'project_id' => 'required|integer',
        'name' => 'required',
        'due_date' => 'required|date',
    ]);

    $task->update($request->all());
    return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
}

public function destroy(Task $task)
{
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}

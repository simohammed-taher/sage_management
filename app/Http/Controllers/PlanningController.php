<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    public function index()
    {
        $plannings = Planning::with(['employee', 'task'])->get();
        return view('plannings.index', compact('plannings'));
    }

    public function create()
    {
        $employees = Employee::all();
        $tasks = Task::all();
        return view('plannings.create', compact('employees', 'tasks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'task_id' => 'required',
            'mon' => 'boolean',
            'tue' => 'boolean',
            'wed' => 'boolean',
            'thu' => 'boolean',
            'fri' => 'boolean',
            'sat' => 'boolean',
            'sun' => 'boolean',
        ]);

        Planning::create($validatedData);
        return redirect()->route('plannings.index')->with('success', 'Planning created successfully.');
    }

    public function show(Planning $planning)
    {
        return view('plannings.show', compact('planning'));
    }

    public function edit(Planning $planning)
    {
        $employees = Employee::all();
        $tasks = Task::all();
        return view('plannings.edit', compact('planning', 'employees', 'tasks'));
    }

    public function update(Request $request, Planning $planning)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'task_id' => 'required',
            'mon' => 'boolean',
            'tue' => 'boolean',
            'wed' => 'boolean',
            'thu' => 'boolean',
            'fri' => 'boolean',
            'sat' => 'boolean',
            'sun' => 'boolean',
        ]);

        $planning->update($validatedData);
        return redirect()->route('plannings.index')->with('success', 'Planning updated successfully.');
    }

    public function destroy(Planning $planning)
    {
        $planning->delete();
        return redirect()->route('plannings.index')->with('success', 'Planning deleted successfully.');
    }
}

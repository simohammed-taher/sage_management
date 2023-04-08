<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index()
    {
        $timesheets = Timesheet::all();
        return view('timesheets.index', compact('timesheets'));
    }

    public function create()
    {
        return view('timesheets.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'day' => 'required|date',
            'attendance' => 'required|boolean',
            'employee_id' => 'required|exists:employees,id',
            'task_id' => 'required|exists:tasks,id',
        ]);

        Timesheet::create($validatedData);

        return redirect()->route('timesheets.index')->with('success', 'Timesheet created successfully.');
    }

    public function show(Timesheet $timesheet)
    {
        return view('timesheets.show', compact('timesheet'));
    }

    public function edit(Timesheet $timesheet)
    {
        return view('timesheets.edit', compact('timesheet'));
    }

    public function update(Request $request, Timesheet $timesheet)
    {
        $validatedData = $request->validate([
            'day' => 'required|date',
            'attendance' => 'required|boolean',
            'employee_id' => 'required|exists:employees,id',
            'task_id' => 'required|exists:tasks,id',
        ]);

        $timesheet->update($validatedData);

        return redirect()->route('timesheets.index')->with('success', 'Timesheet updated successfully.');
    }

    public function destroy(Timesheet $timesheet)
    {
        $timesheet->delete();
        return redirect()->route('timesheets.index')->with('success', 'Timesheet deleted successfully.');
    }
}

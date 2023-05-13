<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;
class EmployeeController extends Controller
{
    public function export()
    {
        return Excel::download(new EmployeesExport, 'users.xlsx');
    }
    public function index()
    {

        $employees = Employee::orderBy('id', 'DESC')->paginate(5);

        return view('employees.index', ['employees' => $employees]);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'image' => 'sometimes|image:gif,png,jpeg,jpg'
        ]);

        if ($validator->passes()) {

            // option #1
            // Save data here
            // $employee = new Employee();
            // $employee->name = $request->name;
            // $employee->email = $request->email;
            // $employee->address = $request->address;
            // $employee->save();

            // option #2
            // $employee = new Employee();
            // $employee->fill($request->post())->save();

            // option #3
            $employee = Employee::create($request->post());

            // Upload image here
            if ($request->image) {
                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time() . '.' . $ext;
                $request->image->move(public_path() . '/uploads/employees/', $newFileName); // This will save file in a folder

                $employee->image = $newFileName;
                $employee->save();
            }

            return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
        } else {
            // return with errrors
            return redirect()->route('employees.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(Employee $employee)
    {
        //$employee = Employee::findOrFail($id);
        return view('employees.edit', ['employee' => $employee]);
    }

    public function update(Employee $employee, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'image' => 'sometimes|image:gif,png,jpeg,jpg'
        ]);

        if ($validator->passes()) {
            // Save data here
            // $employee = Employee::find($id);
            // $employee->name = $request->name;
            // $employee->email = $request->email;
            // $employee->address = $request->address;
            // $employee->save();

            $employee->fill($request->post())->save();

            // Upload image here
            if ($request->image) {
                $oldImage = $employee->image;

                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time() . '.' . $ext;
                $request->image->move(public_path() . '/uploads/employees/', $newFileName); // This will save file in a folder

                $employee->image = $newFileName;
                $employee->save();

                File::delete(public_path() . '/uploads/employees/' . $oldImage);
            }

            return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
        } else {
            // return with errrors
            return redirect()->route('employees.edit', $employee->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy(Employee $employee, Request $request)
    {
        //$employee = Employee::findOrFail($id);
        File::delete(public_path() . '/uploads/employees/' . $employee->image);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}

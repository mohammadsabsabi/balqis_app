<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HrEmployee;
use App\Models\HrDepartment;
class HrEmployeesController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.hr.employees.index', [
            'employees' => HrEmployee::all()
        ]);
    }
    protected function departmentsOptions()
    {
        return HrDepartment::all()->pluck('name', 'id');
    }
    public function create()
    {
        return view('dashboard.pages.hr.employees.create', [
            'employee' => new HrEmployee,
            'departments' => $this->departmentsOptions()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required' | 'string' | 'max:255',
            'email' => 'required' | 'email' | 'unique:hr_employees,email',
            'phone' => 'nullable' | 'string' | 'max:255',
            'department_id' => 'nullable|exists:hr_departments,id',
            'status' => 'required|in:active,inactive,on_leave',
            'jop_title' => 'nullable|string',
            'hire_date' => 'nullable|date',
            'salary' => 'nullable|numeric' | 'min:0',
            'address' => 'nullable|string' | 'max:255',
            'notes' => 'nullable|string' | 'max:1000',
        ]);
        HrEmployee::create(request()->all());
        return redirect()->route('dashboard.hr.employees.index')->with('success', 'تمت الإضافة بنجاح');
    }
    public function edit(HrEmployee $employee)
    {
        return view('dashboard.pages.hr.employees.edit', [
            'employee' => $employee,
            'departments' => $this->departmentsOptions()
        ]);
    }
    public function show(HrEmployee $employee)
    {
        return view('dashboard.pages.hr.employees.show', [
            'employee' => $employee
        ]);
    }
    public function update(Request $request, HrEmployee $employee)
    {
        $request->validate([
            'name' => 'required' | 'string' | 'max:255',
            'email' => 'required' | 'email' | 'unique:hr_employees,email,' . $employee->id,
            'phone' => 'nullable' | 'string' | 'max:255',
            'department_id' => 'nullable|exists:hr_departments,id',
            'status' => 'required|in:active,inactive,on_leave',
            'jop_title' => 'nullable|string',
            'hire_date' => 'nullable|date',
            'salary' => 'nullable|numeric' | 'min:0',
            'address' => 'nullable|string' | 'max:255',
            'notes' => 'nullable|string' | 'max:1000',
        ]);
        $employee->update(request()->all());
        return redirect()->route('dashboard.hr.employees.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy(HrEmployee $employee)
    {
        $employee->delete();
        return redirect()->route('dashboard.hr.employees.index')->with('success', 'تم الحذف بنجاح');
    }
}

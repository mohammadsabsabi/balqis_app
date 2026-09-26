<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\HrDepartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HrDepartmentsController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.hr.departments.index' , [
            'departments' => HrDepartment::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.hr.departments.create' , [
            'department' => new HrDepartment
        ]);
    } 
    protected function validate(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);
    }
    public function store(Request $request)
    {
    
        HrDepartment::create($this->validate($request));

        return redirect()->route('dashboard.hr.departments.index')
            ->with('success', 'تمت الإضافة بنجاح');
    }
    public function edit(HrDepartment $department)
    {
        return view('dashboard.pages.hr.departments.edit' , [
            'department' => $department
        ]);
    }
    public function update(Request $request, HrDepartment $department)
    {
        $department->update($this->validate($request));

        return redirect()->route('dashboard.hr.departments.index')
            ->with('success', ' تم التعديل بنجاح ');
    }
    public function destroy(HrDepartment $department)
    {
        $department->delete();

        return redirect()->route('dashboard.hr.departments.index')
            ->with('success', ' تم الحذف بنجاح ');
    }
    public function show(HrDepartment $department)
    {
        return view('dashboard.pages.hr.departments.show', [
            'department' => $department
        ]);
    }
    
}



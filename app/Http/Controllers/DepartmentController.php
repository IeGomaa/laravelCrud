<?php

namespace App\Http\Controllers;

use App\Http\Traits\departmentTrait;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private $departmentModel;
    use departmentTrait;
    public function __construct(Department $department)
    {
        $this->departmentModel = $department;
    }

    public function index()
    {
        $departments = $this->departmentModel::get();
        return view('Department/index', compact('departments'));
    }

    public function create()
    {
        return view('Department/create');
    }

    /**
     * @param Request $request
     * 1- validation for data
     * 2- insert into database
     * 3- set sessions
     * 4- redirect index
     */
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $this->departmentModel::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        $this->setSessionFlash('done','Department Was Inserted !');
        return redirect(route('department'));

    }

    /**
     * 1- validation data and id
     * 2- select record
     * 3- delete record from database
     * 4- set session
     * 5- redirect back
     */
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:departments,id'
        ]);

        $this->findDepartment($request->id)->delete();

        $this->setSessionFlash('done','Department Was Deleted !');
        return redirect()->back();
    }

//    public function delete($department_id)
//    {
//        $department = Department::where('id', $department_id)->first();
//        if ($department) {
//            $department->delete();
//            session()->flash('done','Department Was Deleted !');
//            return redirect()->back();
//        }
//        return redirect()->back()->withErrors(['Department Not Found !']);
//    }


    /**
     * @param Request $request
     * 1- validation for request
     * 2- connect to model to get record
     * 3- redirect to edit page
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:departments,id'
        ]);

        $department = $this->findDepartment($request->id);
        return view('department/update', compact('department'));
    }

    /**
     * @param Request $request
     * 1- validation for request
     * 2- connect to model to get record
     * 3- update data
     * 4- set session
     * 5- redirect to index page
     */
    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:departments,id',
            'name' => 'required',
            'description' => 'required'
        ]);

        $department = $this->findDepartment($request->id);
        $department->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        $this->setSessionFlash('done','Department Was Updated !');
        return redirect(route('department'));
    }

}

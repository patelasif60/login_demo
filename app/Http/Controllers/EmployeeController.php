<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Services\EmployeeService;
use App\Models\Employee;
use App\Models\Company;
use App\Mail\SendStatusEmail;
use App\Mail\SendCreateEmail;
use Mail;

class EmployeeController extends Controller
{
    public function __construct(EmployeeService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::paginate(10);
        return view('employee.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employee.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = $this->service->create($request->all());

        if ($employee) {
            Mail::to($employee->email)->send(new SendCreateEmail($employee,'employee'));
            flash('Employee created successfully')->success();
        } else {
            flash('Employee could not be created. Please try again.')->error();
        }
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $companies = Company::all();
        $employee   = Employee::find($id);
        return view('employee.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee = $this->service->update($request->all(),$employee);
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $employee = Employee::find($id);
        if ($employee->delete()) {
            flash('Employee deleted successfully')->success();
        } else {
            flash('Employee could not be deleted. Please try again.')->error();
        }
        return redirect()->route('employee.index');
    }
    public function changeStatus(Request $request){
        $id= $request->id;
        $employee = Employee::find($id);
        $employee->is_active = $request->is_active;
        $employee->save();
        Mail::to($employee->email)->send(new SendStatusEmail($employee));
        flash('Email Send successfully')->success();
    }
}

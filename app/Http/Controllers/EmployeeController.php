<?php

namespace App\Http\Controllers;
use App\Repository\EmployeeRepositoryInterface;
use App\Http\Requests\StoreEmployees;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  
    protected $Employee;

    public function __construct(EmployeeRepositoryInterface $Employee)
    {
        $this->Employee = $Employee;
    }

    public function index()
    {
     return $this->Employee->getAllTEmployees();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $specializations = $this->Employee->Getspecialization();
        $genders = $this->Employee->GetGender();
        return view('employees.create',compact('specializations','genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployees $request)
    {
        return $this->Employee->StoreEmployees($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit($id)
    {
        $employees = $this->Employee->editEmployees($id);
        $specializations = $this->Employee->Getspecialization();
        $genders = $this->Employee->GetGender();
        return view('employees.edit',compact('employees','specializations','genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        return $this->Employee->UpdateTEmployees($request);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Employee->DeleteEmployees($request);
    }
}

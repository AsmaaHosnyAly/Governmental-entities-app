<?php

namespace App\Repository;

use App\Models\Employee;
use App\Models\Entity;
use App\Models\Specialization;
use App\Models\Gender;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository implements EmployeeRepositoryInterface{

  public function getAllTEmployees(){
     $employees=Employee::all();
     $entities=Entity::all();
     $specializations=Specialization::all();
     $gender=Gender::all();
     return view('employees.index',compact('employees','entities','specializations','gender'));
    
  }
  public function Getspecialization(){
    return specialization::all();
}
public function GetGender(){
  return Gender::all();
}

public function StoreEmployees($request)
{
try {
       $employees = new Employee();
       $employees->Email = $request->Email;
       $employees->Password =  Hash::make($request->Password);
       $employees->Name = $request->Name;
       $employees->Specialization_id = $request->Specialization_id;
       $employees->Gender_id = $request->Gender_id;
       $employees->Joining_Date = $request->Joining_Date;
       $employees->Address = $request->Address;
       $employees->save();
       toastr()->success('تمت العملية بنجاح');
       return redirect()->route('employees.index');
   }
   catch (Exception $e) {
       return redirect()->back()->with(['error' => $e->getMessage()]);
   }

}


public function editEmployees($id)

{
     return Employee::findOrFail($id);
}


public function UpdateTEmployees($request)

{
   try {
       $employees= Employee::findOrFail($request->id);
       $employees->Email = $request->Email;
       $employees->Password = Hash::make($request->Password);
       $employees->Name = $request->Name;
       $employees->Specialization_id = $request->Specialization_id;
       $employees->Gender_id = $request->Gender_id;
       $employees->Joining_Date = $request->Joining_Date;
       $employees->Address = $request->Address;
       $employees->save();
       toastr()->success('تم التعديل بنجاح');
       return redirect()->route('employees.index');
   }
   catch (Exception $e) {
       return redirect()->back()->with(['error' => $e->getMessage()]);
   }
}


public function DeleteEmployees($request)
{
   Employee::findOrFail($request->id)->delete();
   toastr()->error('تم الخذف');
   return redirect()->route('employees.index');
}


}
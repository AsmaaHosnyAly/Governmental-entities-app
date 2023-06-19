<?php

namespace App\Repository;


interface EmployeeRepositoryInterface{

    // get all Empolyee
    public function  getAllTEmployees();

    // Get specialization
    public function Getspecialization();

    // Get Gender
    public function GetGender();

    // StoreEmployee
    public function StoreEmployees($request);

    // StoreEmployees
    public function editEmployees($id);

    // UpdateEmployees
    public function UpdateTEmployees($request);

    // DeleteEmployees
    public function DeleteEmployees($request);

}




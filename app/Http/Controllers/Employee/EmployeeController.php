<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Resources\Employee\EmployeeDetailResource;
use App\Http\Resources\Employee\EmployeeResource;
use App\Http\Responses\ApiNotFoundResponse;
use App\Http\Responses\ApiOkResponse;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() 
    {
        $employees = Employee::select('id', 'first_name', 'last_name', 'termination_date', 'division_id', 'job_id')
            // ->with(['division', 'job'])
            ->selectRaw('IF(termination_date IS NULL, "active", "inactive") as status')
            ->get();

        if (is_null($employees)) return new ApiNotFoundResponse(false, 'Data not found');


        return new ApiOkResponse(true, 'Data retrieved successfully', $employees);
    }

    public function show($id)   
    {
        $employee = Employee::where('id', $id)
            // ->with(['division:division_name', 'job:job_title,job_description,salary'])
            ->selectRaw('IF(termination_date IS NULL, "active", "inactive") as status')
            ->first();

        if (is_null($employee)) return new ApiNotFoundResponse(false, 'Employee not found');

        return new ApiOkResponse(true, 'Data retrieved successfully', $employee);
    }
}

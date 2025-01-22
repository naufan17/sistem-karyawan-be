<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Repository\Employee\EmployeeRepository;
use App\Http\Responses\ApiNotFoundResponse;
use App\Http\Responses\ApiOkResponse;
use App\Http\Responses\ApiInternalServerErrorResponse;
use App\Http\Responses\ApiCreatedResponse;
use App\Http\Responses\ApiBadRequestResponse;
use App\Models\Employee;
use App\Services\Employee\EmployeeService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request) 
    {
        $status = $request->query('status');
        $division = ucfirst($request->query('division'));

        try {
            $query = Employee::select('id', 'first_name', 'last_name', 'termination_date', 'division_id', 'job_id')
                            ->with(['division', 'job'])
                            ->selectRaw('IF(termination_date IS NULL, "active", "inactive") as status');

            if ($status == 'active') {
                $query->where('termination_date', null);
            } else if ($status == 'inactive') {
                $query->where('termination_date', '!=', null);
            }

            if ($division) {
                $query->whereHas('division', function($query) use ($division) {
                    $query->where('division_name', $division);
                });
            }

            $employees = $query->get()->map(function ($employee) {
                return [
                    'id' => $employee->id,
                    'first_name' => $employee->first_name,
                    'last_name' => $employee->last_name,
                    'division_name' => $employee->division->division_name,
                    'job_title' => $employee->job->job_title,
                    'status' => $employee->status,
                ];
            });
            
            if (is_null($employees)) return new ApiNotFoundResponse( 'Data not found');

            return new ApiOkResponse( 'Data retrieved successfully', $employees);
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return new ApiInternalServerErrorResponse();
        }
    }

    public function show($id)   
    {
        try {
            $employee = Employee::select('id', 'first_name', 'last_name', 'date_of_birth', 'gender', 'email', 'address', 'hire_date', 'termination_date', 'division_id', 'job_id')
                ->where('id', $id)
                ->with(['division', 'job'])
                ->selectRaw('IF(termination_date IS NULL, "active", "inactive") as status')
                ->first();

            if (is_null($employee)) return new ApiNotFoundResponse( 'Employee not found');

            $formattedEmployee = [
                'id' => $employee->id,
                'first_name' => $employee->first_name,
                'last_name' => $employee->last_name,
                'date_of_birth' => $employee->date_of_birth,
                'gender' => $employee->gender,
                'email' => $employee->email,
                'address' => $employee->address,
                'hire_date' => $employee->hire_date,
                'termination_date' => $employee->termination_date,
                'division' => $employee->division->division_name,
                'job_title' => $employee->job->job_title,
                'job_description' => $employee->job->job_description,
                'salary' => $employee->job->salary,
                'status' => $employee->status,
            ];

            return new ApiOkResponse('Data retrieved successfully', $formattedEmployee);
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return new ApiInternalServerErrorResponse();
        }
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'date_of_birth' => 'required|string',
            'gender' => 'required|string|max:10',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'hire_date' => 'required|string',
            'division_id' => 'required|exists:divisions,id',
            'job_id' => 'required|exists:employes_jobs,id',
        ]);

        if($validatedData->fails()) {
            return new ApiBadRequestResponse($validatedData->errors());
        }

        try {
            Employee::create($request->all());

            return new ApiCreatedResponse('Data created successfully');
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return new ApiInternalServerErrorResponse();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = Validator::make($request->all(),[
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'date_of_birth' => 'required|string',
                'gender' => 'required|string|max:10',
                'email' => 'required|email',
                'address' => 'required|string|max:255',
                'hire_date' => 'required|string',
                'division_id' => 'required|exists:divisions,id',
                'job_id' => 'required|exists:employes_jobs,id',
            ]);

            if($validatedData->fails()) {
                return new ApiBadRequestResponse($validatedData->errors());
            }

            $employee = Employee::find($id);
            
            if (is_null($employee)) {
                return new ApiNotFoundResponse('Employee not found');
            }
            
            $employee->update($request->all());

            return new ApiOkResponse('Data updated successfully');
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return new ApiInternalServerErrorResponse();
        }
    }

    public function destroy($id)
    {
        try {
            $employee = Employee::find($id);

            if (is_null($employee)) {
                return new ApiNotFoundResponse('Employee not found');
            }

            $employee->delete();

            return new ApiOkResponse('Data deleted successfully');
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return new ApiInternalServerErrorResponse();
        }
    }
}

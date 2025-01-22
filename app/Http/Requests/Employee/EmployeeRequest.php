<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'in:male,female'],
            'email' => ['required', 'email', 'max:100'],
            'address' => ['required', 'string', 'max:255'],
            'hire_date' => ['required', 'date'],
            'termination_date' => ['nullable', 'date'],
            'division_id' => ['required', 'exists:divisions,division_id'],
            'job_id' => ['required', 'exists:employes_jobs,job_id'],
        ];
    }
}

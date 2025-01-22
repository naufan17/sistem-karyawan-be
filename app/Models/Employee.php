<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $table = 'employes';

    protected $fillable = [
        'first_name', 
        'last_name', 
        'date_of_birth', 
        'gender', 
        'email', 
        'address', 
        'hire_date', 
        'termination_date', 
        'division_id', 
        'job_id'
    ];

    public function division()
    {
        return $this->hasOne(Division::class);
    }

    public function job()
    {
        return $this->hasOne(EmployeeJob::class);
    }
}

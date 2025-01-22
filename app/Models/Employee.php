<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

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
}

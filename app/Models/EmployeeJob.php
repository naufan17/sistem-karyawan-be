<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeJob extends Model
{
    protected $table = 'employee_jobs';

    protected $fillable = [
        'job_title',
        'job_description',
        'salary',
    ];
}

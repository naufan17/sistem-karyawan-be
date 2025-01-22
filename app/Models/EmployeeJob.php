<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeJob extends Model
{
    use HasFactory;

    protected $table = 'employes_jobs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'job_title',
        'job_description',
        'salary',
    ];
}

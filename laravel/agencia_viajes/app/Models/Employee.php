<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $primaryKey = 'emp_id';

    public $incrementing = false;

    protected $keyType = 'int';

    protected $fillable = [
        'emp_id',
        'emp_firstname',
        'emp_lastname',
        'emp_birth_date',
        'emp_hire_date',
        "salary"
    ];
}

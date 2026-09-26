<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrEmployee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'department_id',
        'jop_title',
        'hire_date',
        'status',
        'salary',
        'address',
        'notes',
    ];

    public function department()
    {
        return $this->belongsTo(HrDepartment::class);
    }
}

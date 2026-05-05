<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'department_id',
        'title',
        'description',
        'priority',
        'due_date',
        'completed'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
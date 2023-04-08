<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'day', 'attendance', 'matricule', 'task_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'matricule', 'id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}

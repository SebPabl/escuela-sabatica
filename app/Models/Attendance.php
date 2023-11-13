<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Student;

class Attendance extends Model
{
    protected $table = 'attendances';

    public function students()
    {
        return $this->belongsTo(Student::class);
    }
}

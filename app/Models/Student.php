<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Attendance;
use App\Models\Course;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = ['course_id', 'name', 'lastname', 'age', 'address'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}

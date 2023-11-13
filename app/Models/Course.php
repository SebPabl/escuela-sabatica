<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Student;
use App\Models\User;
use App\Models\Offering;

class Course extends Model
{
    protected $fillable = ['user_id', 'name'];
    protected $table = 'courses';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'course_id');
    }

    public function offerings()
    {
        return $this->belongsToMany(Offering::class);
    }
}

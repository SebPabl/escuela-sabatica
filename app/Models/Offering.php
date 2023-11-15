<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Course;

class Offering extends Model
{
    protected $table = 'offerings';

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}

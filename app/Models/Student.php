<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Attendance;

class Student extends Model
{
    protected $table = 'students';

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}

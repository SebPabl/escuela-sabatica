<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Role extends Model
{
    protected $table = 'roles';

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

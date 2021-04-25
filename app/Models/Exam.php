<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Exam
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

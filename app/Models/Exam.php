<?php

namespace App\Models;

use App\Models\User;
use App\Models\Question;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_code',
        'user_id',
        'title',
        'description',
        'time_limit',
        'active',
    ];

    /**
     * Get the user that owns the Exam
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the questions for the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get all of the attendances for the Exam
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}

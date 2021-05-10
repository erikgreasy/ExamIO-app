<?php

namespace App\Models;

use App\Models\Question;
use App\Models\Attendance;
use App\Models\SelectOption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attendance_id',
        'question_id',
        'text',
        'img_path',
        'select_option_id',
        'is_correct',
    ];

    /**
     * Get the attendance that owns the Answer
     */
    public function attendance(): BelongsTo
    {
        return $this->belongsTo(Attendance::class);
    }

    /**
     * Get the question that belongs to the Answer
     */
    public function questionType() {
        return $this->belongsTo(Question::class, 'question_id');
    }

    /**
     * Get the selectOption associated with the Answer
     */
    public function selectOption(): BelongsTo
    {
        return $this->belongsTo(SelectOption::class);
    }
}

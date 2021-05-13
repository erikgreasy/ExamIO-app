<?php

namespace App\Models;

use App\Models\QuestionType;
use App\Models\SelectOption;
use App\Models\RightPairOption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_id',
        'type_id',
        'text',
    ];

    public function questionType() {
        return $this->belongsTo(QuestionType::class, 'type_id');
    }

    /**
     * Get the exam that owns the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * Get all of the SelectOptions for the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function selectOptions(): HasMany
    {
        return $this->hasMany(SelectOption::class);
    }

    /**
     * Get all of the rightPairOptions for the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rightPairOptions(): HasMany
    {
        return $this->hasMany(RightPairOption::class)->where('is_original',true);
    }

    /**
     * Get all of the leftPairOptions for the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leftPairOptions(): HasMany
    {
        return $this->hasMany(LeftPairOption::class)->where('is_original',true);
    }
}

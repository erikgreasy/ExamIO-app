<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PairAnswer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'left_pair_option_id',
        'right_pair_option_id',
        'answer_id',
        'question_id'
    ];

    //get the left pair answer
    public function leftPairOption(): HasOne
    {
        return $this->hasOne(LeftPairOption::class);
    }

    //get the right pair answer
    public function rightPairOption(): HasOne
    {
        return $this->hasOne(RightPairOption::class);
    }
}

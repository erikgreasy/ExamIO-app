<?php

namespace App\Models;

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
     * Get the attendance that owns the Answer
     */
    public function attendance(): BelongsTo
    {
        return $this->belongsTo(Attendance::class);
    }

    /**
     * Get the selectOption associated with the Answer
     */
    public function selectOption(): BelongsTo
    {
        return $this->belongsTo(SelectOption::class);
    }
}

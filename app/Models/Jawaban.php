<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jawaban extends Model
{
    use HasFactory;
    protected $table = 'tjawaban';

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
}

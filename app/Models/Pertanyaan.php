<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'tpertanyaan';

    public function grup(): BelongsTo
    {
        return $this->belongsTo(Grup::class);
    }

    public function jawaban(): HasMany
    {
        return $this->hasMany(Jawaban::class);
    }
}

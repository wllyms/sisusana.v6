<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'tpertanyaan';

    public function grup(): BelongsTo
    {
        return $this->belongsTo(Grup::class);
    }
}

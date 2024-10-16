<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'tsurvey';

    public function jawaban(): HasMany
    {
        return $this->hasMany(Jawaban::class);
    }
} 

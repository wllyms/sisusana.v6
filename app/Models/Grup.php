<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grup extends Model
{
    use HasFactory;
    protected $table = 'tgrup';

    public function pertanyaan(): HasMany
    {
        return $this->hasMany(Pertanyaan::class);
    }
}

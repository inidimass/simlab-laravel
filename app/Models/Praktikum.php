<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Praktikum extends Model
{
    protected $fillable = [
        'mata_kuliah_id',
        'biaya',
        'status'
    ];

    public function mataKuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function kelasPraktikums(): HasMany
    {
        return $this->hasMany(KelasPraktikum::class);
    }
}

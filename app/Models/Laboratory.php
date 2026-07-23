<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Laboratory extends Model
{
    protected $fillable = [
        'nama',
        'lokasi',
        'kapasitas'
    ];

    public function computers(): HasMany
    {
        return $this->hasMany(Computer::class);
    }

    public function kelasPraktikums(): HasMany
    {
        return $this->hasMany(KelasPraktikum::class);
    }
}

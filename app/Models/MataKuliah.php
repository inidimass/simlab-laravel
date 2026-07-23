<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataKuliah extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'semester',
        'sks'
    ];

    public function praktikums(): HasMany
    {
        return $this->hasMany(Praktikum::class);
    }
}

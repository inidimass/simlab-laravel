<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KelasPraktikum extends Model
{
    protected $fillable = [
        'praktikum_id',
        'dosen_id',
        'laboratory_id',
        'nama_kelas',
        'kuota',
        'kuota_terisi'
    ];

    public function praktikum(): BelongsTo
    {
        return $this->belongsTo(Praktikum::class);
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class);
    }

    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function jadwals(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }

    public function detailPendaftarans(): HasMany
    {
        return $this->hasMany(DetailPendaftaran::class);
    }
}

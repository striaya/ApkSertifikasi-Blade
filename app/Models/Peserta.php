<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'pesertas';
    protected $fillable = [
        'no_peserta',
        'nama',
        'email',
        'no_telepon',
        'alamat',
        'tanggal_lahir',
        'skema_id',
    ];
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function skema() {
        return $this->belongsTo(Skema::class, 'skema_id');
    }
}

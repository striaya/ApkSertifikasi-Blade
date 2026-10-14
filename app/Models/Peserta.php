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
        'nik',
        'no_telepon',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'skema_id',
    ];
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function user()
    {
        return $this->belongTo(User::class);
    }
    
    public function skema() {
        return $this->belongsTo(Skema::class, 'skema_id');
    }
}

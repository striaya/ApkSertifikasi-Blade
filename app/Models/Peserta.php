<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Skema;

class Peserta extends Model
{
    protected $table = 'pesertas';

    protected $fillable = [
        'user_id',
        'no_peserta',
        'nama',
        'email',
        'nik',
        'no_telepon',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'skema_id',
        'status',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skema()
    {
        return $this->belongsTo(Skema::class, 'skema_id');
    }
}
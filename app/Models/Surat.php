<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'user_id',
        'jenis_surat',
        'data_tambahan',
        'status',
        'keterangan_ditolak'
    ];

    protected $casts = [
        'data_tambahan' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

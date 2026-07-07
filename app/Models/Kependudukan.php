<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kependudukan extends Model
{
    use HasFactory;

    protected $table = 'kependudukans';

    // WAJIB masukkan 'user_id' di sini agar bisa disimpan lewat AuthController
    protected $fillable = [
        'user_id', 
        'nik', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'jenis_kelamin', 
        'alamat', 
        'rt_rw', 
        'agama', 
        'pekerjaan', 
        'status_perkawinan'
    ];

    /**
     * Relasi balik ke tabel Users
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
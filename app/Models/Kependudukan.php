<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kependudukan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'kependudukans';

    // 1. Tambahkan 'user_id' ke dalam fillable agar diizinkan masuk ke database saat register
    protected $fillable = [
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        're_rw',
        'agama',
        'pekerjaan',
        'status_perkawinan',
    ];

    /**
     * 2. Perbaiki fungsi relasi agar membaca 'user_id' sesuai ERD database kita
     * Hubungan kebalikan: Data kependudukan ini miliknya satu User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
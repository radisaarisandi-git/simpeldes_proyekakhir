<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kependudukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 
        'alamat', 'rt_rw', 'agama', 'pekerjaan', 'status_perkawinan'
    ];

    // Hubungan kebalikan: Data kependudukan ini miliknya si User
    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }
}
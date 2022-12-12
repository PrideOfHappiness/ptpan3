<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_matakuliah',
        'user_id_dosen',
        'judul',
        'deskripsi',
        'namaFile',
        'waktu_unggah',
    ];
}

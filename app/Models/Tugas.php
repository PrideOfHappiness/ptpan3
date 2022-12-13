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

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class, "id_matakuliah");
    }

    public function id_dosen(){
        return $this->belongsTo(User::class, "user_id_dosen");
    }

    public function tugas(){
        return $this->hasMany(Kumpul_Jawaban::class, "tugas_id");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan_Matakuliah extends Model
{
    use HasFactory;

    protected $table = "pengambilan_matakuliah";

    protected $fillable = [
        'user_id_mahasiswa',
        'id_matakuliah',
        'id_semester',
    ];
    protected $hidden = [
        'user_id_mahasiswa',
        'id_matakuliah',
        'id_semester',
    ];

    public function user_id_mahasiswa(){
        return $this->belongsTo(User::class);
    }

    public function id_matakuliah(){
        return $this->belongsTo(Matakuliah::class);
    }

    public function id_semester(){
        return $this->belongsTo(Semester::class);
    }
}

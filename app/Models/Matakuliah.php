<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';

    protected $fillable = [
        'user_id',
        'nama',
        'nama_dosen',
        'tempat_kelas',
        'tanggal',
        'hari_pelaksanaan',
        'jam_mulai',
        'jam_selesai',
    ];

    public function id_matakuliah(){
        return $this->hasMany(Pengambilan_Matakuliah::class);
    }


}

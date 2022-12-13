<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kumpul_Jawaban extends Model
{
    use HasFactory;

    protected $table = 'kumpul_jawaban';

    protected $fillable = [
        'tugas_id',
        'namaFile',
        'lokasiFile',
        'nilai',
    ];

    public function tugasId(){
        return $this->belongsTo(Tugas::class, "tugas_id");
    }
}

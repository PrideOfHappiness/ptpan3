<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\Tugas;

class TugasController extends Controller
{
    public function index(){
        $dataTugas = Tugas::paginate(15);
        return view('tugas.index', compact('dataTugas'));
    }

    public function create(){
        return view('tugas.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'id_matakuliah' => 'required',
            'user_id_dosen' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
    }
}

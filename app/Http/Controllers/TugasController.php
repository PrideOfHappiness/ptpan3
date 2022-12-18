<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Models\Matakuliah;
use App\Models\Tugas;

class TugasController extends Controller
{
    public function index(){
        $dataTugas = Tugas::paginate(15);
        return view('tugas.index', compact('dataTugas'));
    }

    public function create(){
        $matakuliah = Matakuliah::with('matakuliah_id')->select(['id', 'nama'])->get();
        return view('tugas.create')->with('matakuliah', $matakuliah);
    }

    public function store(Request $request){
        $this->validate($request, [
            'user_id_dosen' => 'required',
            'matakuliah_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'mimes:csv,pdf,docx,xlsx,xls,doc|max:2048',
        ]);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $namaFile = $file->getClientOriginalName();
            $extensi = $file->getClientoriginalExtension();
            $namaFile = $namaFile . '.' . $extensi;
            $path = $request->file('file')->storeAs('upload', $namaFile, 'public');
        }

        //dd($path);
        $tugas = Tugas::create([
            'user_id_dosen' => $request->user_id_dosen,
            'matakuliah_id' => $request->matakuliah_id,
            'judul' => $request->judul,
            'deskripsi'=> $request->deskripsi,
            'lokasiFile' => $namaFile,
        ]);

        return redirect()->route('tugas.index')
            ->with('success', 'Tugas Berhasil Ditambahkan!');
    }

    public function show(Tugas $tugas){
        $namaFile = Tugas::select('lokasiFile')->where('id', $tugas)->get();
        $file = Storage::disk('upload')->get($namaFile);
        return view('tugas.show')->with('tugas', $tugas)->with('file', $file);
    }

    public function edit(Tugas $tugas){

    }

    public function update(Request $request, $id){

    }

    public function destroy(Tugas $tugas){

    }

}

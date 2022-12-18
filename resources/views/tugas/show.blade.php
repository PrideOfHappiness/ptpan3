@extends('dashboard/dashboardDosen')

@section('layout')
    <h1>Detail Data Tugas</h1>
@endsection

@section('isi')
        <div class="mb-3">
            <label for="nama" class="form-label">Judul Tugas</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $tugas->judul }} " placeholder="Nama Matakuliah" required>
        </div>
        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Deskripsi</label>
            <textArea type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $tugas->deskripsi }}"placeholder="Nama Matakuliah" readonly> </textArea>
        </div>
@endsection


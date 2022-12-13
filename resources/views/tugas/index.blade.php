@extends('dashboard/dashboardDosen')

@section('layout')
    <h1>List Data Tugas</h1>
@endsection

@section('isi')
    <div class = "pull-right mb-2">
        <a class="btn btn-success" href="{{ route('pengambilan_matakuliah.create') }}"> Tambah Data Tugas</a>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif

    <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Tugas </th>
                <th>Waktu Upload</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($report_kuliah as $semester)
              <tr>
                <td>{{ $semester->id }} </td>
                <td>
                    <form action = "{{ route('pengambilan_matakuliah.destroy', $semester->id) }}" method="Post">
                      <a class="badge bg-info" href="{{ route('pengambilan_matakuliah.show',$semester->id) }}">Detail</span></a>
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="badge bg-danger"> Delete </button>
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
    </table>
    {!! $report_kuliah->links() !!}
@endsection

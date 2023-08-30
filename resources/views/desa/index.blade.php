@extends('layouts.master')
@section('content')
<div class="content">
  <div class="card card-info card-outline">
    <div class="card-header">

      <div class="card-tools">
        <a href="{{ url('desa/create') }}" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
      </div>
      <h3>Tabel desa</h3>
    </div>

    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama desa</th>
            <th>Kecamatan</th>
            <th>RT</th>
            <th>RW</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @foreach($desa as $item)
          <tr>
            <td> {{ $loop->iteration}}</td>
            <td>{{ $item->nama_desa }}</td>
            <td>{{ $item -> kecamatan -> nama_kecamatan }}</td>
            <td>{{ $item->rt }}</td>
            <td>{{ $item->rw }}</td>
            <td>
              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('desa.destroy', $item->id_desa) }}" method="POST">
                <a href="{{ route('desa.edit', $item->id_desa) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        <tbody>
      </table>
    </div>
  </div>
</div>

@endsection
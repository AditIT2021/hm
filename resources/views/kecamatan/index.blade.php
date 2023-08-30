@extends('layouts.master')
@section('content')
<div class="content">
  <div class="card card-info card-outline">
    <div class="card-header">

      <div class="card-tools">
        <a href="{{ url('kecamatan/create') }}" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
      </div>
      <h3>Tabel kecamatan</h3>
    </div>

    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama kecamatan</th>
            <th>Kabupaten</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @foreach($kecamatan as $item)
          <tr>
            <td> {{ $loop->iteration}}</td>
            <td>{{ $item->nama_kecamatan }}</td>
            <td>{{ $item -> kabupaten -> nama_kabupaten }}</td>
            <td>
              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kecamatan.destroy', $item->id_kecamatan) }}" method="POST">
                <a href="{{ route('kecamatan.edit', $item->id_kecamatan) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
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
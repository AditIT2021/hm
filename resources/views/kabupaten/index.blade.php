@extends('layouts.master')
@section('content')
<div class="content">
  <div class="card card-info card-outline">
    <div class="card-header">

      <div class="card-tools">
        <a href="{{ url('kabupaten/create') }}" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
      </div>
      <h3>Tabel kabupaten</h3>
    </div>

    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama kabupaten</th>
            <th>Provinsi</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @foreach($kabupaten as $item)
          <tr>
            <td> {{ $loop->iteration}}</td>
            <td>{{ $item->nama_kabupaten }}</td>
            <td>{{ $item -> provinsi -> nama_provinsi }}</td>
            <td>
              <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kabupaten.destroy', $item->id_kabupaten) }}" method="POST">
                <a href="{{ route('kabupaten.edit', $item->id_kabupaten) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
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
@extends('layouts.master')
@section('content')
<div class="content">
  <div class="card card-info card-outline">
    <div class="card-header">
      <h3>Create Data kecamatan</h3>
    </div>
    <div class="card-body">
      <form action="{{route('kecamatan.store')}}" method="post">
        @csrf

        <div class="mb-3">
          <label for="nama_kecamatan" class="form-label">Nama kecamatan</label>
          <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror" name="nama_kecamatan" id="nama_kecamatan">
          @error('nama_kecamatan')
          <div class="alert alert-danger mt-2">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="id_kabupaten" class="form-label">kabupaten</label>
          <select class="form-control select2" style="width: 100%" name="id_kabupaten" id="id_kabupaten">
            <option disabled value>Pilih kabupaten</option>
            @foreach ($kabupaten as $item)
            <option value="{{ $item->id_kabupaten }}"> {{ $item->nama_kabupaten }}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-md btn-primary">SAVE</button>
        <button type="submit" class="btn btn-md btn-warning">RESET</button>
      </form>
    </div>
  </div>

</div>
@endsection
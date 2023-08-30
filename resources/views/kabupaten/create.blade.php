@extends('layouts.master')
@section('content')
<div class="content">
  <div class="card card-info card-outline">
    <div class="card-header">
      <h3>Create Data kabupaten</h3>
    </div>
    <div class="card-body">
      <form action="{{route('kabupaten.store')}}" method="post">
        @csrf

        <div class="mb-3">
          <label for="nama_kabupaten" class="form-label">Nama kabupaten</label>
          <input type="text" class="form-control @error('nama_kabupaten') is-invalid @enderror" name="nama_kabupaten" id="nama_kabupaten">
          @error('nama_kabupaten')
          <div class="alert alert-danger mt-2">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="id_provinsi" class="form-label">provinsi</label>
          <select class="form-control select2" style="width: 100%" name="id_provinsi" id="id_provinsi">
            <option disabled value>Pilih provinsi</option>
            @foreach ($provinsi as $item)
            <option value="{{ $item->id_provinsi }}"> {{ $item->nama_provinsi }}</option>
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
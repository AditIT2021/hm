@extends('layouts.master')
@section('content')
<div class="content">
  <div class="card card-info card-outline">
    <div class="card-header">
      <h3>Edit Data Provinsi</h3>
    </div>
    <div class="card-body">
      <form action="{{  route('provinsi.update', $provinsi->id_provinsi )}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="nama_provinsi" class="form-label">Nama Provinsi</label>
          <input type="text" value="{{ $provinsi->nama_provinsi }}" class="form-control @error('nama_provinsi') is-invalid @enderror" name="nama_provinsi" id="nama_provinsi">
          @error('nama_provinsi')
          <div class="alert alert-danger mt-2">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-md btn-primary">save</button>
        <button type="submit" class="btn btn-md btn-warning">reset</button>
      </form>
    </div>
  </div>

</div>
@endsection
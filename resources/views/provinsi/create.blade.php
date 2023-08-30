@extends('layouts.master')
@section('content')
<div class="content">
  <div class="card card-info card-outline">
    <div class="card-header">
      <h3>Create Data Provinsi</h3>
    </div>
    <div class="card-body">
      <form action="{{route('provinsi.store')}}" method="post">
        @csrf

        <div class="mb-3">
          <label for="nama_provinsi" class="form-label">Nama Provinsi</label>
          <input type="text" class="form-control @error('nama_provinsi') is-invalid @enderror" name="nama_provinsi" id="nama_provinsi">
          @error('nama_provinsi')
          <div class="alert alert-danger mt-2">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-md btn-primary">SAVE</button>
        <button type="submit" class="btn btn-md btn-warning">RESET</button>
      </form>
    </div>
  </div>

</div>
@endsection
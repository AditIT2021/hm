@extends('layouts.master')
@section('content')
<div class="content">
  <div class="card card-info card-outline">
    <div class="card-header">
      <h3>Edit Data desa</h3>
    </div>
    <div class="card-body">
      <form action="{{  route('desa.update', $desa->id_desa )}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="nama_desa" class="form-label">Nama desa</label>
          <input type="text" value="{{ $desa->nama_desa }}" class="form-control @error('nama_desa') is-invalid @enderror" name="nama_desa" id="nama_desa">
          @error('nama_desa')
          <div class="alert alert-danger mt-2">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="id_kecamatan" class="form-label">kecamatan</label>
          <select class="form-control select2" style="width: 100%" name="id_kecamatan" id="id_kecamatan">
            <option disabled value>Pilih kecamatan</option>
            <option value="{{ $desa->id_kecamatan }}">{{ $desa-> kecamatan -> nama_kecamatan }}</option>
            @foreach ($kecamatan as $item)
            <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="rt" class="form-label">RT</label>
          <input type="text" value="{{ $desa->rt }}" class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt">
          @error('rt')
          <div class="alert alert-danger mt-2">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="rw" class="form-label">RW</label>
          <input type="text" value="{{ $desa->rw }}" class="form-control @error('rw') is-invalid @enderror" name="rw" id="rw">
          @error('rw')
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
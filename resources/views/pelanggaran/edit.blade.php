@extends('layout')
@section('content')
<h2>Form Edit Data</h2>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Edit Data Guru</p>
          <div class="row">
            <div class="col-12">
                <form action="{{ route('pelanggaran.update') }}" method="post">
                  @csrf
                  @method('put')
                  <input type="hidden" name="id" value="{{ $pelanggaran->id }}" />
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $pelanggaran->nama }}">
                    </div>
                    <div class="form-group">
                        <label>Poin</label>
                        <input type="number" name="poin" class="form-control" value="{{ $pelanggaran->poin }}">
                    </div>
                    <button class="btn btn-outline-primary" type="submit">Simpan</button>
                    <button type="reset" class="btn btn-outline-danger">Reset</button>
                </form>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
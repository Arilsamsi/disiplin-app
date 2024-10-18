@extends('layout')
@section('content')
<h2>Form Tambah Data</h2>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Input Data Baru</p>
          <div class="row">
            <div class="col-12">
                <form action="{{ route('guru.post') }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="number" name="nik" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="number" class="form-control" name="nip">
                    </div>
                    <div class="form-group">
                        <label>NAMA</label>
                        <input type="name" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jk">
                        <option disabled selected class="form-control">--Jenis Kelamin--</option>
                        <option value="L" class="form-control">Laki Laki</option>
                        <option value="P" class="form-control">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email">
                  </div>
                  <div class="form-group">
                    <label>No. Telpon</label>
                    <input type="number" class="form-control" name="telp">
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input name="foto" accept="image/*" type="file" class="form-control">
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
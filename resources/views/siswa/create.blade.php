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
                <form action="{{ route('siswa.post') }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="number" name="nis" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tahun Masuk</label>
                        <input type="date"  name="tahunMasuk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tempat lahir</label>
                        <input type="text" name="tempatLahir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                        <input type="date" name="tanggalLahir" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select name="jk" class="form-control">
                        <option disabled selected class="form-control">--Jenis Kelamin--</option>
                        <option value="L" class="form-control">Laki Laki</option>
                        <option value="P" class="form-control">Perempuan</option>
                      </select>
                    </div>
                  <div class="form-group">
                    <label>No. Telpon</label>
                    <input type="number" name="telp" class="form-control">
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" accept="image/*" name="foto" class="form-control">
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
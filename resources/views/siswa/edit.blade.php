@extends('layout')
@section('content')
<h2>Form Edit Data</h2>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Edit Data Siswa</p>
          <div class="row">
            <div class="col-12">
                <form action="{{ route('siswa.update') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <input type="hidden" name="id" value="{{ $siswa->id }}" />
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="number" readonly name="nis" class="form-control" value="{{ $siswa->nis }}">
                    </div>
                    <div class="form-group">
                        <label>Tahun Masuk</label>
                        <input type="date" name="tahunMasuk" class="form-control" value="{{ $siswa->tahunMasuk }}">
                    </div>
                    <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" name="nama" class="form-control"value="{{ $siswa->nama }}">
                    </div>
                    <div class="form-group">
                        <label>Tempat lahir</label>
                        <input type="text" name="tempatLahir" class="form-control" value="{{ $siswa->tempatLahir }}">
                    </div>
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                        <input type="date" name="tanggalLahir" class="form-control" value="{{ $siswa->tanggalLahir }}">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select name="jk" class="form-control" >
                        <option disabled selected class="form-control">--Jenis Kelamin--</option>
                        <option value="L" {{ $siswa->jk == 'L' ? 'Selected' : '' }} class="form-control">Laki Laki</option>
                        <option value="P" {{ $siswa->jk == 'P' ? 'Selected' : '' }} class="form-control">Perempuan</option>
                      </select>
                    </div>
                  <div class="form-group">
                    <label>No. Telpon</label>
                    <input type="number" name="telp" class="form-control" value="{{ $siswa->telp }}">
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="foto" class="form-control">
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
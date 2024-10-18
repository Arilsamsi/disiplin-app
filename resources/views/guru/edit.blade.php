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
                <form action="{{ route('guru.update') }}" method="post">
                  @csrf
                  @method('put')
                  <input type="hidden" name="id" value="{{ $guru->id }}" />
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="number" readonly name="nik" class="form-control" value="{{ $guru->nik }}">
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" readonly name="nip" class="form-control" value="{{ $guru->nip }}">
                    </div>
                    <div class="form-group">
                        <label>NAMA</label>
                        <input type="text" name="nama" class="form-control"value="{{ $guru->nama }}">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select name="jk" class="form-control" >
                        <option disabled selected class="form-control">--Jenis Kelamin--</option>
                        <option value="L" {{ $guru->jk == 'L' ? 'Selected' : '' }} class="form-control">Laki Laki</option>
                        <option value="P" {{ $guru->jk == 'P' ? 'Selected' : '' }}class="form-control">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $guru->email }}">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="number" name="telp" class="form-control" value="{{ $guru->telp }}">
                    </div>
                    <div class="form-group">
                      <label>Foto</label>
                      <br>
                      @if ($guru->foto != null)
                      <img src="{{ asset('storage/images/guru/'.$guru->foto) }}" alt="" width="100px">
                      @else
                      <img src="https://st4.depositphotos.com/14953852/24787/v/450/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg" alt="" width="120px">
                      @endif
                      <input type="file" class="form-control" name="foto">
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
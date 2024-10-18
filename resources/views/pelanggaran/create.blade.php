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
                <form action="{{ route('pelanggaran.store') }}" method="post">
                  @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Pelanggaran">
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="number" class="form-control" name="poin" placeholder="Poin Pelanggaran">
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
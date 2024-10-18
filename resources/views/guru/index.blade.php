@extends('layout')
@section('content')
<div class="row">
    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
      <h3 class="font-weight-bold">Data Guru</h3>
      <h6 class="font-weight-normal mb-0">
        Pengolahan Data Guru
      </h6>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <a href="{{ route('guru.create') }}" class="btn btn-success mb-2 text-white">Tambah Data</a>
              
              <div class="table-responsive">
                <table
                  id="example"
                  class="display expandable-table"
                  style="width: 100%"
                >
                  <thead>
                    <tr>
                      <th>NIK</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Email</th>
                      <th>No. Telpon</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($guru as $guru)
                        <tr>
                            <td>{{ $guru->nik }}</td>
                            <td>{{ $guru->nip }}</td>
                            <td>{{ $guru->nama }}</td>
                            <td>{{ $guru->jk }}</td>
                            <td>{{ $guru->email }}</td>
                            <td>{{ $guru->telp }}</td>
                            <td>
                              @if ($guru->foto != null)
                              <img src="{{ asset('storage/images/guru/'.$guru->foto) }}" alt="not-found" width="90px">
                              @else
                              <img src="https://st4.depositphotos.com/14953852/24787/v/450/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg" alt="" width="120px">
                              @endif
                            </td>
                            <td>
                                <form action="{{ route('guru.delete') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $guru->id }}">
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-sm btn-warning text-white"><i class="mdi mdi-border-color text-white"></i></a>
                                  <button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Anda yakin Menghapus?')"><i class="mdi mdi-delete text-white"></i></button>
                                  </div>
                                </form>
                            </td>
                        </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
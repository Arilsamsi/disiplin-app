@extends('layout')
@section('content')
<div class="row">
    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
      <h3 class="font-weight-bold">Data Siswa</h3>
      <h6 class="font-weight-normal mb-0">
        Pengolahan Data Siswa
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
              <a href="{{ route('siswa.create') }}" class="btn btn-success mb-2 text-white">Tambah Data</a>
              <div class="table-responsive">
                @if (Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
                <table
                  id="example"
                  class="display expandable-table"
                  style="width: 100%"
                >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>NIS</th>
                      <th>Tahun Masuk</th>
                      <th>Nama</th>
                      <th>Tempat Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>No. HP</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  @php
                      $no = 1
                  @endphp
                  <tbody>
                   @foreach ($siswa as $siswa)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->tahunMasuk }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->tempatLahir }}, {{ $siswa->tanggalLahir }}</td>
                            <td>{{ $siswa->jk }}</td>
                            <td>{{ $siswa->telp }}</td>
                            <td>
                              @if ($siswa->foto != null)
                              <img src="{{ asset('storage/images/siswa/'.$siswa->foto) }}" alt="not-found" width="100px" class="rounded-circle">
                              @else
                              <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="" width="120px" class="rounded-circle">
                              @endif
                            </td>
                            <td>
                                <form action="{{ route('siswa.destroy') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $siswa->id }}">
                                  <div class="btn-group">
                                    <a class="btn btn-sm btn-warning text-white" href="{{ route('siswa.edit', $siswa->id) }}"><i class="mdi mdi-border-color text-white"></i></a>
                                    <button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Anda yakin Menghapus?')"><i class="mdi mdi-delete text-white"></i></button>
                                  </div>
                                </form>
                            </td>
                        </tr>
                   @endforeach
                  </tbody>
                </table>
                {{-- {{ $siswa->links() }} --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
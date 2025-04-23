@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Data Siswa</h3>
                <h6 class="font-weight-normal mb-0">
                    Halaman pengelolaan data Kelas
                </h6>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('kelas.create')}}" class="btn btn-md btn-outline-primary mb-1">Tambah Data</a>
                        {{-- <button type="button" class="btn btn-md btn-outline-primary mb-2" data-toggle="modal" data-target="#modalKelas">
                            Tambah Kelas
                        </button> --}}
                        <div class="table-responsive">
                            <table id="example" class="display expandable-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Kelas</th>
                                        <th>Jumlah Siswa Terdaftar</th>
                                        <th>Detail</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                    <tr>
                                        <td>{{$d->id}}</td>
                                        <td>{{$d->nama}}</td>
                                        <td>{{count($d->siswa)}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('siswa.listToAdd',$d->id) }}" class="btn btn-sm btn-success">Pemetaan Siswa di Kelas</a>
                                                <a href="{{ route('siswa.listed',$d->id) }}" class="btn btn-sm btn-primary">Lihat Daftar Siswa</a>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ route('kelas.destroy') }}" method="POST">
                                              @csrf
                                              <input type="hidden" name="id" value="{{ $d->id }}">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('kelas.edit', $d->id) }}" class="btn btn-sm btn-warning text-white"><i class="mdi mdi-border-color text-white"></i></a>
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

{{-- Modal Create --}}
<div class="modal fade" id="modalKelas" tabindex="-1" role="dialog" aria-labelledby="modalKelasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('kelas.post') }}" method="post" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalKelasLabel">Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="namaKelas">Nama Kelas</label>
                    <input type="text" name="nama" class="form-control" id="namaKelas" placeholder="Nama Kelas">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Kelas -->
<div class="modal fade" id="modalEditKelas" tabindex="-1" role="dialog" aria-labelledby="modalEditKelasLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <form method="POST" action="{{ route('kelas.update') }}" class="modal-content">
        @csrf
        @method('PUT')
  
        <input type="hidden" name="id" id="editIdKelas">
  
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditKelasLabel">Edit Kelas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <div class="modal-body">
          <div class="form-group">
            <label for="editNamaKelas">Nama Kelas</label>
            <input type="text" class="form-control" name="nama" id="editNamaKelas" value="{{ $d->nama }}" required>
          </div>
        </div>
  
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
  
@endsection
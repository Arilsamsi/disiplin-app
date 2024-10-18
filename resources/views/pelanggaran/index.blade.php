@extends('layout')
@section('content')
<div class="row">
    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
      <h3 class="font-weight-bold">Pelanggaran</h3>
      <h6 class="font-weight-normal mb-0">
        Pengolahan Data Pelanggaran
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
              <div class="table-responsive">
                <a href="{{ route('pelanggaran.create') }}" class="btn btn-primary mb-2">Tambah Data</a>
                <table
                  id="example"
                  class="display expandable-table"
                  style="width: 100%"
                >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Poin</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  @php
                      $no = 1
                  @endphp
                  <tbody>
                    @foreach ($pelanggaran as $p)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->poin }}</td>
                        <td>
                            <form action="{{ route('pelanggaran.delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $p->id }}">
                                <div class="btn-group">
                                  <a class="btn btn-sm btn-warning text-white" href="{{ route('pelanggaran.edit', $p->id) }}"><i class="mdi mdi-border-color text-white"></i></a>
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
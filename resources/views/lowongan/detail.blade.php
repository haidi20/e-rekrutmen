@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h4>Table</h4>
        <h4>Tugas dan Tanggung Jawab</h4>
      </div>
      <div class="col-md-3 text-right tombol-atas">
        <a href="{{route('tanggungjawab.create')}}" class="btn btn-success btn-md button-top">Tambah</a>
      </div>
      <div class="col-md-3">
        <h4>Table</h4>
        <h4>Kualifikasi</h4>
      </div>
      <div class="col-md-3 text-right tombol-atas">
        <a href="{{route('kualifikasi.create')}}" class="btn btn-success btn-md button-top">Tambah</a>
      </div>
    </div>
    <hr class="dashed mt20 mb20">
    {{-- <div class="row">
      <form action="{{route('lowongan.index')}}" method="get">
        <div class="col-md-1 oke">
          <button type="submit" class="btn btn-success btn-md">Oke</button>
        </div>
      </form>
    </div> --}}
    <br>
    <div class="row">
      <div class="col-md-6">
        <table class="table table-bordered table-custom">
          <thead>
            <tr>
              <th width="10">No</th>
              <th>Nama</th>
              <th width="125px">Action</th>
            </tr>
          </thead>
          <tbody>
             <tr>
              <td>1</td>
              <td>Bisa Komputer</td>
              <td>
                <a href="#" class="btn btn-info btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
          </tbody>
        </table>
        {{-- {!! $sekolah->appends(Request::input()); !!} --}}
      </div>
      <div class="col-md-6">
        <table class="table table-bordered table-custom">
          <thead>
            <tr>
              <th width="10">No</th>
              <th>Nama</th>
              <th width="125px">Action</th>
            </tr>
          </thead>
          <tbody>
             <tr>
              <td>1</td>
              <td>Minimal SMK/SMA/Sederajat</td>
              <td>
                <a href="#" class="btn btn-info btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
              </td>
            </tr>
          </tbody>
        </table>
        {{-- {!! $sekolah->appends(Request::input()); !!} --}}
      </div>
    </div>
  </div>
@endsection

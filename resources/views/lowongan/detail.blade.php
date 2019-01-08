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
             @forelse($tanggungjawab as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->nama}}</td>
                <td>
                  <a href="{{route('tanggungjawab.edit',$item->id)}}" class="btn btn-sm btn-info">
                       Edit
                  </a>
                  <a href="{{ route('tanggungjawab.destroy',$item->id)}}"
                      data-method="delete" data-confirm="Anda yakin akan menghapus data ini ?"
                      class="btn btn-sm btn-danger" title="Hapus Data">
                      Delete
                  </a>
                </td>
              </tr> 
            @empty
              <tr>
                <td colspan="4" align="center">Kosong</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        {!! $tanggungjawab->links(); !!}
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
             @forelse($kualifikasi as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->nama}}</td>
                <td>
                  <a href="{{route('kualifikasi.edit',$item->id)}}" class="btn btn-sm btn-info">
                       Edit
                  </a>
                  <a href="{{ route('kualifikasi.destroy',$item->id)}}"
                      data-method="delete" data-confirm="Anda yakin akan menghapus data ini ?"
                      class="btn btn-sm btn-danger" title="Hapus Data">
                      Delete
                  </a>
                </td>
              </tr> 
            @empty
              <tr>
                <td colspan="4" align="center">Kosong</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        {!! $kualifikasi->links(); !!}
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-custom">
          <thead>
            <tr>
              <th width="10">No</th>
              <th>Nama Pengguna</th>
              <th width="100px">Action</th>
            </tr>
          </thead>
          <tbody>
             @forelse($lamaran as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->nama_pengguna}}</td>
                <td align="center">
                  <a href="{{route('biodata.index', ['user' => $item->user_id])}}" class="btn btn-sm btn-warning">Detail</a>
                  {{-- <a href="{{route('lamaran.terima',['lowongan' => $item->id])}}" class="btn btn-sm btn-info">
                       Edit
                  </a> --}}
                  {{-- <a href="{{route('lamaran.destroy',$item->id)}}"
                      data-method="delete" data-confirm="Anda yakin akan menghapus data ini ?"
                      class="btn btn-sm btn-danger" title="Hapus Data">
                      Delete
                  </a> --}}
                </td>
              </tr> 
            @empty
              <tr>
                <td colspan="4" align="center">Kosong</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        {!! $lamaran->links(); !!}
      </div>
    </div>
  </div>
@endsection

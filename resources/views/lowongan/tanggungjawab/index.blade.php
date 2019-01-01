@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Daftar</h2>
        <h2>Tugas dan Tanggung Jawab</h2>
      </div>
      <div class="col-md-6 text-right button-top">
        <a href="{{route('lowongan.edit', $lowongan)}}" class="btn btn-default">Back</a>
        <a href="{{route('tanggungjawab.create')}}" class="btn btn-success btn-md">Tambah</a>
        <a href="{{route('kualifikasi.index')}}" class="btn btn-info btn-md">Selanjutnya</a>
      </div>
    </div>
    <hr class="dashed mt20 mb20">
    <br>
    <div class="row">
      <div class="col-md-12">
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
    </div>
  </div>
@endsection

@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Table Bidang</h1>
      </div>
      <div class="col-md-6 text-right tombol-atas">
        <a href="{{route('bidang.create')}}" class="btn btn-success btn-md button-top">Tambah</a>
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
      <div class="col-md-12">
        <table class="table table-bordered table-custom">
          <thead>
            <tr>
              <th width="10">No</th>
              <th>Nama Bidang</th>
              <th width="200px">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($bidang as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->nama}}</td>
                <td>
                  <a href="{{route('bidang.edit',$item->id)}}" class="btn btn-sm btn-info">
                       Edit
                  </a>
                  <a href="{{ route('bidang.destroy',$item->id)}}"
                      data-method="delete" data-confirm="Anda yakin akan menghapus data ini ?"
                      class="btn btn-sm btn-danger" title="Hapus Data">
                      Delete
                  </a>
                </td>
              </tr> 
            @empty
              <tr>
                <td colspan="3" align="center">Kosong</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        {{-- {!! $sekolah->appends(Request::input()); !!} --}}
      </div>
    </div>

  </div>
@endsection

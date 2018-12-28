@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Table Lowongan</h1>
      </div>
      <div class="col-md-6 text-right tombol-atas">
        <a href="{{route('lowongan.create')}}" class="btn btn-success btn-md button-top">Tambah</a>
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
              <th>Nama Perusahaan</th>
              <th>Nama Bidang</th>
              <th width="200px">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse($lowongan as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->nama_perusahaan}}</td>
                <td>{{$item->nama_bidang}}</td>
                <td>
                  <a href="{{route('lowongan.show', $item->id)}}" class="btn btn-sm btn-warning">Detail</a>
                  <a href="{{route('lowongan.edit',$item->id)}}" class="btn btn-sm btn-info">
                       Edit
                  </a>
                  <a href="{{ route('lowongan.destroy',$item->id)}}"
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
        {!! $lowongan->links() !!}
      </div>
    </div>

  </div>
@endsection

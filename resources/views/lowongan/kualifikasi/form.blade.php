@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Form Kualifikasi</h2>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{$back}}" class="btn btn-info btn-md button-top">Kembali</a>
      </div>
    </div>
    <hr class="dashed m mt20 mb20">
    <form action="{{$action}}" method="post" class="form-horizontal">
      <input type="hidden" name="_method" value="{{$method}}">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-5 col-md-offset-1">
           <div class="col-md">
              <div class="form-group">
                <label for="nama">Nama Kualifikasi</label>
                <input type="text" id="nama" name="nama[]" class="form-control" value="{{old('nama')}}">
                <p class="tulisan-error"></p>
              </div>
            </div>
        </div>
      </div>              
      <div class="row">
        <div class="col-md-3 col-md-offset-1">
          <a href="javascript:;" class="btn btn-md btn-danger" onClick="kurang()">Hapus</a>
          <a href="javascript:;" class="btn btn-md btn-info" onClick="tambah('Kualifikasi')">Tambah</a>
          <button class="btn btn-success btn-md">Kirim</button>
        </div>
      </div>
    </form>
    <br>
  </div>
@endsection

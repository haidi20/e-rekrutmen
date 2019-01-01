@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Form</h2>
        <h2>Tugas dan Tanggung Jawab</h2>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{$back}}" class="btn btn-info btn-md button-top">Kembali</a>
      </div>
    </div>
    <hr class="dashed m mt20 mb20">
    <form action="{{$action}}" method="post" class="form-horizontal">
      <input type="hidden" name="_method" value="{{$method}}">
      {{ csrf_field() }}
      <div class="row" id="row">
        <div class="col-md-5 col-md-offset-1">
          <div class="form-group">
            <label for="nama">Nama Tugas dan Tanggung Jawab</label>
            <input type="text" id="nama" name="nama[]" class="form-control" value="{{old('nama')}}">
          </div>
        </div>
      </div>              
      <div class="row">
        <div class="col-md-3 col-md-offset-1">
          @if($method == 'POST')
            <a href="javascript:;" class="btn btn-md btn-danger" onClick="kurang()">Hapus</a>
            <a href="javascript:;" class="btn btn-md btn-info" onClick="tambah('Tugas dan Tanggung Jawab')">Tambah</a>
          @endif
          <button class="btn btn-success btn-md">Kirim</button>
        </div>
      </div>
    </form>
    <br>
  </div>
@endsection

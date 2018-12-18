@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Form</h2>
        <h2>Tugas dan Tanggung Jawab</h2>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('tanggungjawab.index')}}" class="btn btn-info btn-md button-top">Kembali</a>
      </div>
    </div>
    <hr class="dashed m mt20 mb20">
    <form action="#" method="post" class="form-horizontal">
      <input type="hidden" name="_method" value="#">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-5 col-md-offset-1">
           <div class="col-md">
              <div class="form-group">
                <label for="nama">Nama Tugas dan Tanggung Jawab</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{old('nama')}}">
                <p class="tulisan-error"></p>
              </div>
            </div>
        </div>
      </div>              
      <div class="row">
        <div class="col-md-3 col-md-offset-1">
          <button class="btn btn-success btn-md">Kirim</button>
        </div>
      </div>
    </form>
    <br>
  </div>
@endsection

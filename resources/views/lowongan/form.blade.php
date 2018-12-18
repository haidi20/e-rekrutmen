@extends('_layouts.default')

@section('script-bottom')
  <script>
    function tanggungjawab()
    {
      $('#tanggungjawab').modal('show');
    }
  </script>
@endsection

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Form Lowongan</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('lowongan.index')}}" class="btn btn-info btn-md button-top">Kembali</a>
      </div>
    </div>
    <hr class="dashed m mt20 mb20">
    <form action="{{route('tanggungjawab.index')}}" method="get" class="form-horizontal">
      <div class="row">
        
          <div class="col-md-5 col-md-offset-1">
              <input type="hidden" name="_method" value="#">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label for="nama">Nama Perusahaan</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{old('nama')}}">
                    <p class="tulisan-error"></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label for="bidang">Nama Bidang</label>
                    <input type="text" id="bidang" name="bidang" class="form-control" value="{{old('bidang')}}">
                    <p class="tulisan-error"></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label for="pendidikan_id">Nama Kota</label>
                    <select name="pendidikan_id" id="pendidikan_id" class="form-control">
                      <option value="">Pilih Nama Kota</option>
                      
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label class="control-label" for="focusedInput">Tanggal</label>
                    <input type="text" id="datepicker" class="form-control">
                  </div>
                </div>
              </div>
              {{-- <div class="row">
                <div class="col-md">
                  <div class="form-group {{kondisi_error($errors,'pendidikan_id')}}">
                    <label for="pendidikan_id">Jenjang Pendidikan</label>
                    <select name="pendidikan_id" id="pendidikan_id" class="form-control">
                      <option value="">Pilih Jenjang Pendidikan</option>
                      @foreach ($pendidikan as $index => $item)
                        <option value="{{$item->id}}" {{old('pendidikan_id') == $item->id?'selected':''}}>{{$item->nama}}</option>
                      @endforeach
                    </select>
                    <p class="tulisan-error">{{kondisi_tulisan_error($errors,'pendidikan_id')}}</p>
                  </div>
                </div>
              </div> --}}
          </div>
          <div class="col-md-5 col-md-offset-1">
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="logo">Logo Perusahaan</label>
                  <input type="file" id="logo" name="logo">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="textArea" class="col-md-5 control-label">Profil Perusahaan</label>
                  <div class="col-md-12">
                    <textarea class="form-control" rows="3" name="profil" id="textArea"></textarea>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="row">
              <div class="col-md-6" align="center">
                <h5>Tugas dan Tanggung Jawab</h5>
                <a href="javascript:;" onClick="tanggungjawab()" class="btn btn-lg btn-default">Buat</a>
              </div>
              <div class="col-md-6" align="center">
                <h5>Kualifikasi</h5>
                <a href="javascript:;" class="btn btn-lg btn-default">Buat</a>
              </div>
            </div> --}}
          </div>
          @include('lowongan.modal')
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <button class="btn btn-success btn-block btn-lg">Selanjutnya</button>
        </div>
      </div>
    </form>
    <br>
  </div>
@endsection

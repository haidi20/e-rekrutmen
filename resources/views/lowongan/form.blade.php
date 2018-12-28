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
    <form action="{{$action}}" method="POST" class="form-horizontal">
      <div class="row">
        
          <div class="col-md-5 col-md-offset-1">
              <input type="hidden" name="_method" value="{{$method}}">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" value="{{old('nama')}}" required>
                    <p class="tulisan-error"></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label for="bidang_id">Nama Bidang</label>
                    <select name="bidang_id" id="bidang_id" class="form-control" required>
                      <option value="">Pilih Nama Bidang</option>
                      @foreach ($bidang as $index => $item)
                        <option value="{{$item->id}}" {{old('bidang_id') == $item->id?'selected':''}}>{{$item->nama}}</option>
                      @endforeach
                    </select>
                   {{--  <p class="tulisan-error">{{kondisi_tulisan_error($errors,'pendidikan_id')}}</p> --}}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label for="select2">Nama Kota</label>
                    <select name="nama_kota" id="select2" class="form-control" required>
                      <option value="">Pilih Nama Kota</option>
                      @foreach($namakota as $index => $item)
                        <option value="{{$item}}" {{old('nama_kota') == $item ? 'selected' : ''}}>{{$item}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md">
                  <div class="form-group">
                    <label class="control-label" for="focusedInput">Tanggal</label>
                    <input type="text" id="datepicker" name="tanggal" class="form-control" required>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-md-5 col-md-offset-1">
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="gambar">Logo Perusahaan</label>
                  <input type="file" id="gambar" name="gambar" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="textArea" class="col-md-5 control-label">Profil Perusahaan</label>
                  <div class="col-md-12">
                    <textarea class="form-control" rows="3" name="profil" id="textArea" required></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

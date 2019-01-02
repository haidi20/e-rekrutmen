@extends('_layouts.default')

@section('script-top')
	<style>
		/*a:link, a:visited {
			color:#0d2244;
			text-decoration: none;
		}*/
	</style>
@endsection

@section('script-bottom')
	<script>
		// $(document).ready( function(){
			var gambar 	= $('#gambar').val();
			var cv 		= $('#cv').val();

			console.log(gambar);

			// if(gambar && cv){
			// 	$('#gambar #cv').hide();
			// }
		// });
	</script>
@endsection

@section('konten')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
        	<div class="jumbotron">
        		<div align="center">
        			<h3>Lengkapi Data Diri Anda</h3>
        			<hr>
        		</div>
        		<br>
        		<form action="{{$action}}" method="POST" enctype="multipart/form-data">
        			<input type="hidden" name="_method" value="{{$method}}">
      				{{ csrf_field() }}
	        		<div class="row">
	        			<div class="col-md-6">
	        				<div class="form-group">
							  @if(old('gambar'))
							  <a href="{{asset('storages')}}/{{old('gambar')}}" class="btn btn-md btn-primary"> Download File Foto </a>
							  @else
							  <label class="control-label" for="focusedInput">Masukkan Foto</label>
							  <input type="file" name="gambar" id="gambar" value="{{old('gambar')}}">
							  @endif
							  {{-- <h3 class="done">Done</h3> --}}
							</div>
							<div class="form-group">
								@if(old('gambar'))
							  		<a href="{{asset('storages')}}/{{old('cv')}}" class="btn btn-md btn-primary"> Download File CV </a>
							  	@else
							  		<label class="control-label" for="focusedInput">Masukkan CV</label>
							  		<input type="file" name="cv" id="cv" value="{{old('cv')}}">
							  	@endif
							  {{-- <h3 class="done">Done</h3> --}}
							</div>
							<div class="form-group">
							  <label class="control-label" for="focusedInput">Tempat Lahir</label>
							  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{old('tempat_lahir')}}" required>
							</div>
							<div class="form-group">
							  <label class="control-label" for="focusedInput">Tanggal Lahir</label>
							  <input type="text" name="tanggal_lahir" id="datepicker" value="{{old('tanggal_lahir')}}" class="form-control" required>
							</div>
	        			</div>
	        			<div class="col-md-6">
	        				<div class="form-group">
							  <label class="control-label" for="focusedInput">Nama Sekolah</label>
							  <input type="input" name="nama_sekolah" class="form-control" value="{{old('nama_sekolah')}}" required>
							</div>
							<div class="form-group">
							  <label class="control-label" for="focusedInput">Tahun Kelulusan</label>
							  <input type="input" class="form-control" name="tahun_kelulusan" value="{{old('tahun_kelulusan')}}" required>
							</div>
							<div class="form-group">
							  <label class="control-label" for="focusedInput">Nilai AKhir</label>
							  <input type="input" class="form-control" name="nilai_akhir" value="{{old('nilai_akhir')}}" required>
							</div>
	        			</div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-offset-3 col-md-6">
	        				<button class="btn btn-lg btn-block btn-success">Kirim</button>
	        			</div>
	        		</div>
	        	</form>
        	</div>
        </div>
    </div>
</div>
@endsection

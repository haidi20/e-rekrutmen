@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
        	<div class="jumbotron">
        		<div align="center">
        			<h3>Biodata Pengguna</h3>
        			<hr>
        		</div>
        		<br>
        		<div class="row">
        			<div class="col-md-4">
        				<div align="center">
        					<img src="{{asset('storages')}}/{{$biodata->gambar}}" width="200"><br><br>
        					<a href="{{asset('storages')}}/{{$biodata->cv}}" class="btn btn-md btn-primary"> Download File CV </a>
        				</div>        				
        			</div>
        			<div class="col-md-4">
        				<div class="form-group">
							<label class="control-label" for="focusedInput">Username</label>
							<h5>{{Auth::user()->username}}</h5>
						</div>
						<div class="form-group">
							<label class="control-label" for="focusedInput">Tempat Lahir</label>
							<h5>{{$biodata->tempat_lahir}}</h5>
						</div>
						<div class="form-group">
							<label class="control-label" for="focusedInput">Tanggal Lahir</label>
							<h5>{{$biodata->tanggal_lahir}}</h5>
						</div>
						<div class="form-group">
							<label class="control-label" for="focusedInput">Nama Sekolah</label>
							<h5>{{$biodata->nama_sekolah}}</h5>
						</div>
						<div class="form-group">
							<label class="control-label" for="focusedInput">Tahun Kelulusan</label>
							<h5>{{$biodata->tahun_kelulusan}}</h5>
						</div>
						<div class="form-group">
							<label class="control-label" for="focusedInput">Nilai Akhir</label>
							<h5>{{$biodata->nilai_akhir}}</h5>
						</div>
        			</div>
        			<div class="col-md-4">
        				<a href="{{route('biodata.edit', $biodata->id)}}" class="btn btn-md btn-primary">Edit Data</a>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection

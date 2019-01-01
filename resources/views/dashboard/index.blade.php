@extends('_layouts.default')

@section('script-top')
	<style>
		a:link, a:visited {
			color:#0d2244;
			text-decoration: none;
		}
	</style>
@endsection

@section('konten')
  <div class="container">
    <div class="row">
        <div class="col-md-4">
        	<div class="jumbotron">
        		<div class="form-group">
				  <label class="control-label" for="focusedInput">Nama Kota</label>
				  <select class="form-control">
				  	<option>Pilih Kota</option>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" for="focusedInput">Nama Bidang</label>
				  <select class="form-control">
				  	<option>Pilih Bidang</option>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" for="focusedInput">Periode</label>
				  <select class="form-control">
				  	<option>Pilih Periode</option>
				  	<option>Januari - Juni</option>
				  	<option>Juli - Desember</option>
				  </select>
				</div>
				<div class="form-group">
				  <label class="control-label" for="focusedInput">Tahun</label>
				  <select class="form-control">
				  	<option>Pilih Tahun</option>
				  </select>
				</div>
        	</div>
        </div>
        <div class="col-md-8">
        	@foreach($lowongan as $index => $item)
				<div class="row">
	        		<div class="col-md-12">
	        			<a href="{{route('dashboard.show', $item->id)}}" >
		        			<div class="jumbotron">
				        		<h3>{{$item->nama_perusahaan}}</h3>
				        		<h5>{{$item->nama_bidang}} | {{$item->nama_kota}} | {{$item->tanggal}}</h6> <br>
				        		<h6>
				        			@foreach($item->tanggungjawab as $key => $value)
										{{$value->nama}},
				        			@endforeach
				        		</h6>
				        	</div>
				        </a>
	        		</div>
	        	</div>
        	@endforeach
        	{{-- <div class="row">
        		<div class="col-md-12">
        			<a href="{{url('detail')}}" >
	        			<div class="jumbotron">
			        		<h3>Nama Perusahaan</h3>
			        		<h6>Nama Bidang | Kota Lowongan | Tanggal</h6> <br>
			        		<p>
			        			Penjelasan Lowongan
			        		</p>
			        	</div>
			        </a>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-12">
        			<a href="{{url('detail')}}" >
	        			<div class="jumbotron">
			        		<h3>Nama Perusahaan</h3>
			        		<h6>nama Bidang | Kota Lowongan | Tanggal</h6> <br>
			        		<p>
			        			Penjelasan Lowongan
			        		</p>
			        	</div>
			        </a>
        		</div>
        	</div>
        </div> --}}
        {!! $lowongan->links(); !!}
    </div>
</div>
@endsection

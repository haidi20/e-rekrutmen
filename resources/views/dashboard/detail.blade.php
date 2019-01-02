@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
        <div class="col-md-8">
        	<div class="jumbotron">
        		<div class="row">
        			<div class="col-md-10">
        				<h3>{{$lowongan->nama_perusahaan}}</h3>
			    		<h6>{{$lowongan->nama_bidang}} | {{$lowongan->nama_kota}} | {{$lowongan->tanggal}}</h6> <br>
        			</div>
        			<div class="col-md-2">
        				<a href="{{url('dashboard')}}" class="btn btn-md btn-info button-top">Kembali</a>
        			</div>
        		</div>
        		<hr>
        		<br>
        		<div class="row">
        			<div class="col-md-12">
        				<h4>Tugas dan Tanggung Jawab :</h4>
        				<ul>
        					@foreach($lowongan->tanggungjawab as $index => $item)
                                <li>{{$item->nama}}</li>
                            @endforeach
        				</ul>
        				<h4>Kualifikasi :</h4>
        				<ul>
        					@foreach($lowongan->kualifikasi as $index => $item)
                                <li>{{$item->nama}}</li>
                            @endforeach
        				</ul>
        			</div>
        		</div>
                <div class="row">
                    <a href="#" class="btn btn-md btn-success button-top">Kirim Lamaran</a>
                </div>
        	</div>
        </div>
        <div class="col-md-4">
        	<div class="jumbotron">
        		<div align="center">
        			<div class="form-group">
                        <label for="foto">Foto</label><br>
                        <img src="{{asset('storages')}}/{{$lowongan->gambar}}" width="200">
                    </div>
        		</div>
        		<h5 align="center">
        		  {{$lowongan->profile_perusahaan}}	
                </h5>
        	</div>
        </div>
    </div>
</div>
@endsection

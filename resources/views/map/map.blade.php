@extends('_layouts.default')

@section('script-top')
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
<style>
    #mapid { min-height: 420px; }
</style>
@endsection

@section('script-bottom')
	<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

    <script>
    	var map = L.map('mapid').setView(
    		['-0.502106','117.153709'], 13
    	);

    	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	    }).addTo(map);
    </script>
@endsection

@section('konten')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
        	<h1>Belajar Map</h1>
            <a href="{{url('create-map')}}" class="btn btn-md btn-success">buat</a>
        	<div id="mapid"></div>
        </div>
    </div>
</div>
@endsection

@extends('_layouts.default')

@section('script-top')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
  <style>
      #mapid { min-height: 300px; }
  </style>
@endsection

@section('script-bottom')
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

    <script>
      var mapCenter = ['-0.502106','117.153709'] ;
      var map = L.map('mapid').setView(
        mapCenter, 13
      );

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      var marker = L.marker(mapCenter).addTo(map);

      map.on('click', function(e) {
        let latitude  = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);

        $('#latitude').val(latitude);
        $('#longitude').val(longitude);

        // console.log(latitude);
      });

      function updateMarker(lat, lng)
      {
        var info = "";
        info = info + "lokasimu "+marker.getLatLng().toString()+" <br>";
        info = info + "coba";

        marker
        .setLatLng([lat, lng])
        .bindPopup(info)
        .openPopup();

        return false;
      }

      var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val(), $('#longitude').val() );
      }

      $('#latitude').on('input', updateMarkerByInputs);
      $('#longitude').on('input', updateMarkerByInputs);
    </script>
@endsection

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Form Map</h2>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{url('show-map')}}" class="btn btn-info btn-md button-top">Kembali</a>
      </div>
    </div>
    <hr class="dashed m mt20 mb20">
    {{-- <form action="#" method="post" class="form-horizontal">
      <input type="hidden" name="_method" value="#">
      {{ csrf_field() }} --}}
      <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="form-group">
              <label for="latitude">Latitude</label>
              <input type="text" id="latitude" name="latitude" class="form-control" value="">
              <p class="tulisan-error"></p>
            </div>
            <div class="form-group">
              <label for="longitude">Longitude</label>
              <input type="text" id="longitude" name="longitude" class="form-control" value="">
              <p class="tulisan-error"></p>
            </div>
        </div>
      </div>
      <div class="row">
        <div id="mapid"></div>
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

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token">
    <title>E-rekrutment</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    @yield('script-top')
  </head>
  <body>
    <div>
      @yield('tubuh')
    </div>
    <script>
      var Laravel = {
        csrfToken: '{{ csrf_token() }}'
      }
    </script>
    <script src="{{mix('js/app.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
    $( function() {
      $("#datepicker").datepicker();
      $('#bidang_id').select2();
      $('#nama_kota').select2();
    } );
    </script>
    <script>
      var nomor = 1;
      
      function tambah(fungsi)
      {
        var form = "";
        nomor++;
        // form = form + "<div id=''>";
        form = form + "<label class='nama_"+nomor+"'>Nama "+fungsi+"</label>";
        form = form + "<input type='text' name='nama[]' class='form-control nama_"+nomor+"' value=''>";
        // form = form + "</div>"

        $('.form-group').append(form);
      }

      function kurang()
      {        
        $('.nama_'+nomor).remove();

        if(nomor != 1){
          nomor--;
        }
      }
    </script>
    @yield('script-bottom')
  </body>
</html>

@extends('_layouts.default')

@section('script-top')
<style type="text/css">
.forget-password{
  margin-right: 10px;
  cursor:pointer;
}
</style>
@endsection

@section('konten')
  <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 batas-atas">
          <div class="account-wall">
            <h2 align="center">Masuk</h2>
            {{-- <form class="form-signin" action="{{route('login')}}" method="post"> --}}
            <form class="form-signin" action="{{url('login')}}" method="post">
              {{ csrf_field() }}
              <input type="text" name="email" class="form-control" placeholder="email" required autofocus>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
              <button class="btn btn-lg btn-primary btn-block" type="submit">
                  Oke
              </button>
            </form>
              <h6 align="right" class="forget-password">Lupa Kata Sandi ? <a href="{{url('password/reset')}}" align="right"> Klik di sini</a></h6>
          </div>
        </div>
    </div>
</div>
@endsection

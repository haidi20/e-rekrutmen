<?php
Route::get('/',function(){
  return redirect()->route('login');
});
// Route::group(['middleware' => 'auth'],function(){
  Route::get('dashboard', function(){
    session()->put('aktif','dashboard');
    session()->put('aktiff','');
    return view('dashboard.index');
  })->name('dashboard');
// });
  Route::get('detail', function(){
  	return view('dashboard.detail');
  });

  Route::get('pengaturan', 'PengaturanController@index');

  Route::resource('biodata', 'BiodataController');
  Route::resource('lowongan', 'LowonganController');
  // Route::get('lowongan/detail', 'LowonganController@detail');
  Route::resource('tanggungjawab', 'TanggungJawabController');
  Route::resource('kualifikasi', 'KualifikasiController');

  Route::get('show-map', function(){
    return view('map.map');
  });
  Route::get('create-map', function(){
    return view('map.create');
  });

//auth laravel
Auth::routes();

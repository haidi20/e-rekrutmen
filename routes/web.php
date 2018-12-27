<?php
Route::get('/',function(){
  return redirect()->route('login');
});
// Route::group(['middleware' => 'auth'],function(){
  Route::get('dashboard', function(){
    return view('dashboard.index');
  })->name('dashboard');
  Route::get('detail', function(){
  	return view('dashboard.detail'); 
  });
  Route::get('pengaturan', 'PengaturanController@index');

  Route::resource('biodata', 'BiodataController');
  Route::resource('lowongan', 'LowonganController');
  Route::resource('tanggungjawab', 'TanggungJawabController');
  Route::resource('kualifikasi', 'KualifikasiController');
// });

//auth laravel
Auth::routes();

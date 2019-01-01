<?php
Route::get('/',function(){
  return redirect()->route('dashboard');
});

Route::resource('dashboard', 'DashboardController');

// Route::group(['middleware' => 'auth'],function(){
  Route::get('pengaturan', 'PengaturanController@index');

  Route::resource('biodata', 'BiodataController');
  Route::resource('bidang', 'BidangController');
  Route::resource('lowongan', 'LowonganController');
  Route::resource('tanggungjawab', 'TanggungJawabController');
  Route::resource('kualifikasi', 'KualifikasiController');
// });

//auth laravel
Auth::routes();

<?php
Route::get('/',function(){
  return redirect()->route('dashboard.index');
});

Route::resource('dashboard', 'DashboardController');

Route::group(['middleware' => 'auth'],function(){
  Route::resource('pengaturan', 'PengaturanController');
  Route::resource('biodata', 'BiodataController');
  Route::resource('bidang', 'BidangController');
  Route::resource('lowongan', 'LowonganController');
  Route::resource('tanggungjawab', 'TanggungJawabController');
  Route::resource('kualifikasi', 'KualifikasiController');

  Route::resource('lamaran', 'LamaranController');
});

//auth laravel
Auth::routes();

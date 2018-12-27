<?php
Route::get('/',function(){
  return redirect()->route('dashboard');
});
Route::get('dashboard', function(){
  return view('dashboard.index');
})->name('dashboard');
Route::get('detail', function(){
  return view('dashboard.detail'); 
});

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

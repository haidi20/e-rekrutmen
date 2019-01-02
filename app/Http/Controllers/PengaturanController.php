<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class PengaturanController extends Controller
{
    public function index()
    {
    	return view('pengguna.pengaturan');
    }

    public function store()
    {
    	$user = Auth::user();

    	$user->password = bcrypt(request('password'));
    	$user->save();

    	return redirect()->route('pengaturan.index');
    }
}

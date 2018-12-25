<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
	public function index()
	{
		return view('pengguna.biodata');
	}

    public function create()
    {
    	return view('pengguna.form-biodata');
    }
}

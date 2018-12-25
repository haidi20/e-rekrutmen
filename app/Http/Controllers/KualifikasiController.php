<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KualifikasiController extends Controller
{
    public function index()
    {
    	return view('lowongan.kualifikasi.index');
    }

    public function create()
    {
    	return view('lowongan.kualifikasi.form');
    }
}

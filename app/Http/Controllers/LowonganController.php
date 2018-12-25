<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index()
    {
    	return view('lowongan.index');
    }

    public function create()
    {
    	return view('lowongan.form');
    }

    public function show()
    {
    	return view('lowongan.detail');
    }
}

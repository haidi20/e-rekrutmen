<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TanggungJawabController extends Controller
{
    public function index()
    {
    	return view('lowongan.tanggungjawab.index');
    }

    public function create()
    {
    	return view('lowongan.tanggungjawab.form');
    }
}

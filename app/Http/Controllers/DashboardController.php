<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lowongan;

class DashboardController extends Controller
{
    public function __construct(
    							Request $request,
    							Lowongan $lowongan
    							){
    	$this->request 	= $request;
    	$this->lowongan = $lowongan;
    }

    public function index()
    {
    	$lowongan = $this->lowongan->paginate(5);

    	return view('dashboard.index', compact('lowongan'));
    }

    public function show($id)
    {
        $lowongan = $this->lowongan->find($id);

        return view('dashboard.detail', compact('lowongan'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lamaran;

use Auth;

class LamaranController extends Controller
{
	public function __construct(Request $request, Lamaran $lamaran)
	{
		$this->lamaran = $lamaran;
		$this->request = $request;
	}

    public function index()
    {
    	$user = Auth::user();
    	$user->lowongan_id = request('lowongan');
    	$user->save();

    	session()->flash('note', true);

    	return redirect()->back();
    }
}

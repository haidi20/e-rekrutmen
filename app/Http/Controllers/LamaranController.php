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

        $lamaran = $this->lamaran;
        $lamaran->lowongan_id   = request('lowongan');
        $lamaran->user_id       = Auth::user()->id;
        $lamaran->save();

    	session()->flash('note', true);

    	return redirect()->back();
    }

    public function terima()
    {
        return request('user');
    }
}

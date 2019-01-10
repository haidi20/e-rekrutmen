<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lamaran;

use Auth;
use Mail;

class LamaranController extends Controller
{
	public function __construct(
                                Mail $mail,
                                Request $request, 
                                Lamaran $lamaran
                            )
	{
        $this->mail     = $mail;
		$this->lamaran  = $lamaran;
		$this->request  = $request;
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

        // kondisi show notifikasi lamaran telah di kirim sebagai user
    	session()->flash('note', true);

    	return redirect()->back();
    }

    public function terima()
    {
        $data = ['pesan' => 'coba'];

        Mail::send('email.pesan', $data, function($message)
        {
            $message->to('haidinurhadinata@gmail.com', 'Jon Doe')->subject('Selamat');
        });
    }
}

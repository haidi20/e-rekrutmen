<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Lamaran;

use Auth;
use Mail;

class LamaranController extends Controller
{
	public function __construct(
                                User $user,
                                Mail $mail,
                                Request $request, 
                                Lamaran $lamaran
                            )
	{
        $this->user     = $user;
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
        $data   = ['pesan' => 'Selamat, Anda Di terima'];

        $user   = $this->user->where('id', request('user'))->first();

        Mail::send('email.pesan', $data, function($message) use ($user)
        {
            $message->to($user->email, $user->username)->subject('Selamat');
        });

        session()->flash('note', true);

        return redirect()->back();
    }
}

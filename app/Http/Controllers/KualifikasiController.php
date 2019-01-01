<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kualifikasi;

class KualifikasiController extends Controller
{
	public function __construct(
								Request $request, 
								Kualifikasi $kualifikasi
							)
	{
		$this->kualifikasi 	= $kualifikasi;
		$this->request 		= $request;
	}

    public function index()
    {
    	$lowongan       = session()->get('lowongan');
        $kualifikasi  = $this->kualifikasi->lowongan($lowongan)->paginate(10);

    	return view('lowongan.kualifikasi.index', compact('kualifikasi'));
    }

    public function create()
    {
        return $this->form();
    }

    public function edit($id)
    {
        return $this->form($id);
    }

    public function form($id = null){
        $carikualifikasi = $this->kualifikasi->find($id);

        if ($carikualifikasi) {
            session()->flashInput($carikualifikasi->toArray());
            $action = route('kualifikasi.update',$id);
            $method = 'PUT';
        }else{
            $action = route('kualifikasi.store');
            $method = 'POST';
        } 

        // kondisi fitur detail lowongan atau table kualifikasi
        if(session()->get('detail')){
            $back = route('lowongan.show', session()->get('lowongan'));
        }else{
            $back = route('kualifikasi.index');
        }       

        return view('lowongan.kualifikasi.form',compact(
            'action', 'method', 'back'
        ));
    }

    public function store(){
        return $this->save();
    }

    public function update($id){
        return $this->save($id);
    }

    public function save($id = null){
        if ($id) {
            $kualifikasi = $this->kualifikasi->find($id);
            $kualifikasi->nama      	= request('nama')[0];
        	$kualifikasi->lowongan_id	= session()->get('lowongan');
        	$kualifikasi->save();
        }else{
        	foreach(request('nama') as $index => $item){
        		$kualifikasi = new $this->kualifikasi;
        		$kualifikasi->nama      	= $item;
        		$kualifikasi->lowongan_id	= session()->get('lowongan');
        		$kualifikasi->save();
        	}
            
        }

        $input = $this->request->except('_token');
        // return $input;

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);

        return redirect()->route('kualifikasi.index');
    }

    public function destroy($id)
    {
        $kualifikasi = $this->kualifikasi->find($id);
        $kualifikasi->delete();

        return redirect()->back();
    }
}

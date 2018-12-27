<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lowongan;
use App\Models\Bidang;

class LowonganController extends Controller
{
    public function __construct(
                                Request $request, 
                                Lowongan $lowongan,
                                Bidang $bidang
                            )
    {
        $this->lowongan = $lowongan;
        $this->bidang   = $bidang;
        $this->request  = $request;
    }

    public function index()
    {
        $lowongan = $this->lowongan->get();

    	return view('lowongan.index', compact('lowongan'));
    }

    public function show()
    {
    	return view('lowongan.detail');
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
        $carilowongan = $this->lowongan->find($id);

        if ($carilowongan) {
            session()->flashInput($carilowongan->toArray());
            $action = route('lowongan.update',$id);
            $method = 'PUT';
        }else{
            $action = route('lowongan.store');
            $method = 'POST';
        }

        $bidang = $this->bidang->get();

        return view('lowongan.form',compact(
            'action', 'method', 'bidang'
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
            $lowongan = $this->lowongan->find($id);
        }else{
            $lowongan = $this->lowongan;
        }

        $input = $this->request->except('_token');
        // return $input;

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);

        $lowongan->nama_perusahaan      = request('nama_perusahaan');
        $lowongan->bidang_id            = request('bidang_id');
        $lowongan->nama_kota            = request('nama_kota');
        $lowongan->tanggal              = format_tanggal(request('tanggal'));
        $lowongan->gambar               = request('gambar');
        $lowongan->profile_perusahaan   = request('profile');
        $lowongan->save();

        return redirect()->route('tanggungjawab.index');
    }

    public function destroy($id)
    {
        $lowongan = $this->lowongan->find($id);
        $lowongan->delete();

        return redirect()->back();
    }
}

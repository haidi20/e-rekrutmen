<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bidang;
use App\Models\Lowongan;
use App\Models\Kualifikasi;
use App\Models\TanggungJawab;

use App\Supports\Api;
use App\Supports\FileManager;

class LowonganController extends Controller
{
    public function __construct(
                                Api $api,                                
                                Bidang $bidang,
                                Request $request, 
                                Lowongan $lowongan,
                                FileManager $filemanager,
                                Kualifikasi $kualifikasi,
                                TanggungJawab $tanggungjawab
                            )
    {
        $this->api          = $api;
        $this->bidang       = $bidang;
        $this->request      = $request;
        $this->lowongan     = $lowongan;
        $this->kualifikasi  = $kualifikasi;
        $this->filemanager  = $filemanager;
        $this->tanggungjawab= $tanggungjawab;
    }

    public function index()
    {
        $lowongan = $this->lowongan->paginate(10);

    	return view('lowongan.index', compact('lowongan', 'namakota'));
    }

    public function show($id)
    {
        $kualifikasi    = $this->kualifikasi->lowongan($id)->paginate(10);
        $tanggungjawab  = $this->tanggungjawab->lowongan($id)->paginate(10);

        session()->put('detail', true);

    	return view('lowongan.detail', compact('kualifikasi', 'tanggungjawab'));
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
        $kota   = $this->api->kota()->getData();
        $kota   = $kota->data;

        foreach ($kota as $index => $item) {
            $namakota[] = $item->name;
        }        

        return view('lowongan.form',compact(
            'action', 'method', 'bidang', 'namakota'
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
        $lowongan->gambar               = $this->filemanager->getFileName(request()->file('logo'), $lowongan->gambar);
        $lowongan->profile_perusahaan   = request('profil');
        $lowongan->save();

        session()->put('detail', false);
        session()->put('lowongan', $lowongan->id);

        return redirect()->route('tanggungjawab.index');
    }

    public function destroy($id)
    {
        $lowongan = $this->lowongan->find($id);
        $lowongan->delete();

        return redirect()->back();
    }
}

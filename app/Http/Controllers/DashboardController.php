<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bidang;
use App\Models\Lowongan;

use App\Supports\Api;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct(
                                Api $api,                                
                                Bidang $bidang,
                                Request $request,
    							Lowongan $lowongan
    							){
        $this->api      = $api;
        $this->bidang   = $bidang;
    	$this->request 	= $request;
    	$this->lowongan = $lowongan;
    }

    public function index()
    {
        $namakota         = $this->namaKota(); 
        $bidang           = $this->bidang->get();
        $tahun            = Carbon::now()->format('Y');
        $tahun_sebelumnya = Carbon::now()->subYears(2)->format('Y'); 
        $lowongan         = $this->lowongan->kondisi()->paginate(5);     
        
    	return view('dashboard.index', compact(
            'lowongan', 'bidang', 'namakota', 'tahun', 'tahun_sebelumnya'
        ));
    }

    public function show($id)
    {
        $lowongan = $this->lowongan->find($id);

        return view('dashboard.detail', compact('lowongan'));
    }

    public function namaKota()
    {
        $kota             = $this->api->kota()->getData();
        $kota             = $kota->data;

        foreach ($kota as $index => $item) {
            $namakota[] = $item->name;
        }

        return $namakota;
    }
}

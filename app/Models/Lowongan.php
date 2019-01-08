<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Lowongan extends Model
{
    protected $table = 'lowongan';

    public function bidang()
    {
    	return $this->belongsTo('App\Models\Bidang');
    }

    public function tanggungjawab()
    {
        return $this->hasMany('App\Models\TanggungJawab', 'lowongan_id');
    }

    public function kualifikasi()
    {
        return $this->hasMany('App\Models\Kualifikasi', 'lowongan_id');
    }

    public function scopeKondisi($query)
    {
        if(request('nama_kota')){
            $query->where('nama_kota', request('nama_kota'));
        }
        if(request('bidang_id')){
            $query->where('bidang_id', request('bidang_id'));
        }if(request('periode') || request('tahun')){
            $dari   = $this->formatWaktu()->dari;
            $ke     = $this->formatWaktu()->ke;
            
            $query->whereBetween('tanggal', array($dari, $ke));
        }
        
        return $query;
    }

    public function getNamaBidangAttribute()
    {
    	if($this->bidang){
    		return $this->bidang->nama;
    	}
    }

    public function formatWaktu()
    {
        $dari   = Carbon::now();
        $ke     = Carbon::now();

        if(request('periode')){
            if(request('periode') == 1){
                $dari   = $dari->month(1);
                $ke     = $ke->month(6);
            }else{
                $dari   = $dari->month(7);
                $ke     = $ke->month(12);
            }
        }else{
            $dari   = $dari->month(1);
            $ke     = $ke->month(12);
        }

        $dari       = $dari->year(request('tahun'))->day(1)->format('Y-m-d');
        $ke         = $ke->year(request('tahun'))->day(31)->format('Y-m-d');

        return (object) compact('dari', 'ke');
    }
}

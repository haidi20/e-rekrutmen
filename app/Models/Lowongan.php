<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function getNamaBidangAttribute()
    {
    	if($this->bidang){
    		return $this->bidang->nama;
    	}
    }
}

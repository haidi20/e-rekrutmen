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

    public function getNamaBidangAttribute()
    {
    	if($this->bidang){
    		return $this->bidang->nama;
    	}
    }
}

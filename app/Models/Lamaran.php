<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

    public function scopeLowongan($query, $id)
    {
    	return $query->where('lowongan_id', $id);
    }

    public function getNamaPenggunaAttribute()
    {
    	if($this->user){
    		return $this->user->username;
    	}
    }


}

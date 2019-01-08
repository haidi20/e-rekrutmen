<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function getNamaPenggunaAttribute()
    {
    	if($this->user){
    		return $this->user->username;
    	}
    }

    public function getIdPenggunaAttribute()
    {
        if($this->user){
            return $this->user->id;
        }
    }
}

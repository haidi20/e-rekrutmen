<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kualifikasi extends Model
{
    public function scopeLowongan($query, $id)
    {
    	return $query->where('lowongan_id', $id);
    }
}

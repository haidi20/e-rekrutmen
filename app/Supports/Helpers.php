<?php 

// use Auth;
use Carbon\Carbon;

if( ! function_exists('format_tanggal') )
{
	function format_tanggal($data){
		$tanggal = Carbon::parse($data);
		
		return $tanggal->year.'-'.$tanggal->month.'-'.$tanggal->day;
	}
}

if( ! function_exists('kondisi_peran') )
{
	function kondisi_peran(){
		if(Auth::user()){
            return Auth::user()->role == 'admin' ? 'admin' : '';
        }else{
            return '';
        }
	}
}
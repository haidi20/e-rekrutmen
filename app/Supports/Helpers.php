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

if( ! function_exists('kondisi_lamaran') )
{
	function kondisi_lamaran($lowongan){
		return \Auth::user()->lowongan_id == $lowongan ? 'disabled' : '' ; 
	}
}
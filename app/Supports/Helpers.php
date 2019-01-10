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
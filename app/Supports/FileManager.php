<?php

namespace App\Supports;

class FileManager{
	public function getFileName($files, $nameBefore)
	{
		if($files){
			// @unlink(public_path('storages/' . $karyawan->foto));
			$extension      = $files->getClientOriginalExtension();
	    	$fileName       = str_random(8) . '.' . $extension;
		    $files->move("storages/", $fileName);
		    return $fileName;
		}else{
			return $nameBefore;
		}
	}
}
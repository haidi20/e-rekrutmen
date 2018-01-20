<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pertanyaan;

class KuisionerController extends Controller
{
    public function baca(){
      return Pertanyaan::with('keterangan')->kondisi()->paginate(10);
      // return response()->json($pertanyaan);
    }

    public function index(){
      return view('kuisioner.index',compact('pertanyaan'));
    }

    public function store(){
      return 'kuisioner store';
    }
}

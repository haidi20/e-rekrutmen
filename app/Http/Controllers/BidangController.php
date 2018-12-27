<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bidang;

class BidangController extends Controller
{
	public function __construct(Request $request, Bidang $bidang)
	{
		$this->bidang 	= $bidang;
		$this->request 	= $request;
	}

    public function index()
    {
    	$bidang = $this->bidang->get();

    	return view('bidang.index', compact('bidang'));
    }

    public function create()
    {
    	return $this->form();
    }

    public function edit($id)
    {
    	return $this->form($id);
    }

    public function form($id = null){
        $caribidang = $this->bidang->find($id);

        if ($caribidang) {
            session()->flashInput($caribidang->toArray());
            $action = route('bidang.update',$id);
            $method = 'PUT';
        }else{
            $action = route('bidang.store');
            $method = 'POST';
        }

        return view('bidang.form',compact(
        	'action', 'method'
        ));
    }

    public function store(){
        return $this->save();
    }

    public function update($id){
        return $this->save($id);
    }

    public function save($id = null){
        if ($id) {
            $bidang = $this->bidang->find($id);
        }else{
            $bidang = $this->bidang;
        }

        $input = $this->request->except('_token');
        // return $input;

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);

        $bidang->nama  		= request('nama');
        $bidang->save();

        return redirect()->route('bidang.index');
    }

    public function destroy($id)
    {
    	$bidang = $this->bidang->find($id);
    	$bidang->delete();

    	return redirect()->back();
    }
}

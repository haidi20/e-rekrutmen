<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TanggungJawab;

class TanggungJawabController extends Controller
{
	public function __construct(
								TanggungJawab $tanggungjawab,
								Request $request
							)
	{
		$this->tanggungjawab 	= $tanggungjawab;
		$this->request 			= $request;

		session()->put('lowongan', request('lowongan'));
	}

    public function index()
    {
    	$tanggungjawab 	= $this->tanggungjawab->paginate(10);
    	$lowongan 		= session()->get('lowongan');

    	return view('lowongan.tanggungjawab.index', compact('lowongan', 'tanggungjawab'));
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
        $caritanggungjawab = $this->tanggungjawab->find($id);

        if ($caritanggungjawab) {
            session()->flashInput($caritanggungjawab->toArray());
            $action = route('tanggungjawab.update',$id);
            $method = 'PUT';
        }else{
            $action = route('tanggungjawab.store');
            $method = 'POST';
        }       

        return view('lowongan.tanggungjawab.form',compact(
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
            $tanggungjawab = $this->tanggungjawab->find($id);
            $tanggungjawab->nama      	= request('nama')[0];
        	$tanggungjawab->lowongan_id	= session()->get('lowongan');
        	$tanggungjawab->save();
        }else{
        	foreach(request('nama') as $index => $item){
        		$tanggungjawab = new $this->tanggungjawab;
        		$tanggungjawab->nama      	= $item;
        		$tanggungjawab->lowongan_id	= session()->get('lowongan');
        		$tanggungjawab->save();
        	}
            
        }

        $input = $this->request->except('_token');
        // return $input;

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);

        return redirect()->route('tanggungjawab.index');
    }

    public function destroy($id)
    {
        $tanggungjawab = $this->tanggungjawab->find($id);
        $tanggungjawab->delete();

        return redirect()->back();
    }
}

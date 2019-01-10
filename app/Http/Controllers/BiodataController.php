<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Biodata;

use App\Supports\FileManager;

use Auth;

class BiodataController extends Controller
{
	public function __construct(
								Request $request,
								Biodata $biodata,
								FileManager $filemanager
								){
		$this->request 		= $request;
		$this->biodata 		= $biodata;
		$this->filemanager 	= $filemanager;
	}

	public function index()
	{
		$user_id      = request('user') ? request('user') : Auth::user()->id;
		$biodata      = $this->biodata->where('user_id', $user_id)->first();
        $kondisiperan = Auth::user() ? Auth::user()->role : '';

		return view('pengguna.biodata', compact('biodata', 'kondisiperan'));
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
        $caribiodata = $this->biodata->find($id);

        if ($caribiodata) {
            session()->flashInput($caribiodata->toArray());
            $action = route('biodata.update', $id);
            $method = 'PUT';
        }else{
            $action = route('biodata.store');
            $method = 'POST';
        }      

        return view('pengguna.form-biodata',compact(
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
        if($id){
            $biodata = $this->biodata->find($id);
        }else{
        	$biodata = $this->biodata;
        }

        $input = $this->request->except('_token');
        // return $input->file('gambar');

        // $this->validate(request(),[
        //   'nik'  => 'required',
        //   'nama'  => 'required',
        // ]);

        $biodata->user_id      		= Auth::user()->id;
        $biodata->gambar      		= $this->filemanager->getFileName(request()->file('gambar'), $biodata->gambar);
        $biodata->cv      			= $this->filemanager->getFileName(request()->file('cv'), $biodata->cv);
        $biodata->tempat_lahir 		= request('tempat_lahir');
        $biodata->nama_sekolah 		= request('nama_sekolah');
        $biodata->tahun_kelulusan 	= request('tahun_kelulusan');
        $biodata->nilai_akhir 		= request('nilai_akhir');
        $biodata->tanggal_lahir		= format_tanggal(request('tanggal_lahir'));
    	$biodata->save();

        return redirect()->route('biodata.index');
    }

    public function destroy($id)
    {
        $biodata = $this->biodata->find($id);
        $biodata->delete();

        return redirect()->back();
    }
}

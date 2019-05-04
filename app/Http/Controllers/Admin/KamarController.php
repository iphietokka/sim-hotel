<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Kamar;
use App\kamarType;
use App\Lantai;
use Auth;
use Alert;

class KamarController extends Controller
{
    function __construct()
    {
        $this->title = 'kamar';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $data = Kamar::all();
        $kamar_type = KamarType::pluck('nama','id');
        $lantais = Lantai::pluck('nama','id');
        // dd($lantai);
        return view('Admin.'.$title.'.index',compact('title','data','kamar_type','lantais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor_kamar' => 'required',
            'type_id' => 'integer|min:1',
            'lantai_id' => 'integer|min:1',
            'max_dewasa' =>'integer|min:1',
            'max_anak' =>'integer|min:1'
        ]);
         $model = $request->all();

     
          if (Kamar::create($model)){
            Alert::success('Successfully Updated', 'Success');
        }else{
             Alert::error('Something went wrong!', 'Oops...');
        }
        return Redirect::to('admin/'.$this->title);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = $request->all();
        $data = Kamar::find($model['id']); 

        if ($data->update($model)){                
            Alert::success('Data Berhasil Diupdate', 'Selamat');
        }else{
            Alert::error('Data Gagal Diupdate', 'Maaf');
        }
        return Redirect::to('admin/'.$this->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = Kamar::find($id);
        if($data->delete()){
            Alert::success('Data Berhasil Dihapus', 'Selamat');
        }else{
            Alert::error('Data Gagal Dihapus', 'Maaf');
        }
        return Redirect::to('admin/'.$this->title);
    }



    public function terpakai(Request $request)
    {
         $title = $this->title;
        $data = Kamar::with('typekamar','lantais')->where('status',0)->orderBy('nomor_kamar')->get();
          $data = Kamar::with('typekamar','lantais')->where('status',2)->orderBy('nomor_kamar')->get();
        $kamar = Kamar::where('status',1)->with('transaksi','typekamar')->whereHas('transaksi')->get();
         return view('admin.'.$this->title.'.terpakai', compact('title','kamar'));
    }

     public function kotor(Request $request)
    {
         $title = $this->title;
            $data = Kamar::with('typekamar','lantais')->where('status',0)->orderBy('nomor_kamar')->get();
          $kamar = Kamar::with('typekamar','lantais')->where('status',2)->orderBy('nomor_kamar')->get();
        
         return view('admin.'.$this->title.'.kotor', compact('title','kamar'));
    }

     public function tersedia(Request $request)
    {
         $title = $this->title;
            $kamar = Kamar::with('typekamar','lantais')->where('status',0)->orderBy('nomor_kamar')->get();
         
        
         return view('admin.'.$this->title.'.tersedia', compact('title','kamar'));
    }
}

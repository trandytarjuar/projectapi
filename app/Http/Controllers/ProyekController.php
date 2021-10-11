<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProyekController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table proyek
        $proyek = Proyek::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $proyek  
        ], 200);

    }
    
     /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find proyek by ID
        $proyek = Proyek::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Proyek',
            'data'    => $proyek 
        ], 200);

    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'luas_lahan' => 'required',
            'jumlah_unit' => 'required',  
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024', 
        ]);


        if($gambar = $request->file('gambar')){
            $path = $gambar->store('public/files');
            $explode = explode('/', $path);
            $implode = implode($explode);
            $tostr = substr($implode, 11);
            // dd($tostr);
        }

            $proyek = new Proyek(); 
            $proyek->nama = $request->nama; 
            $proyek->alamat = $request->alamat; 
            $proyek->luas_lahan = $request->luas_lahan;
            $proyek->jumlah_unit = $request->jumlah_unit;
            $proyek->deskripsi = $request->deskripsi;
            $proyek->created_at = date('Y-m-d H:i:s');
            $proyek->gambar = $tostr;
            // $proyek->created_by = Session::get('id');
            $proyek->save(); 

            $result = [
                'status' => 'success',
                'message' => $proyek,
            ];
          
        return $result; 

    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $proyek
     * @return void
     */
    public function update(Request $request)
    {
        

        if($gambar = $request->file('gambar')){
            $path = $gambar->store('public/files');
            $explode = explode('/', $path);
            $implode = implode($explode);
            $tostr = substr($implode, 11);
            // dd($tostr);
        }

        Proyek::where('id', '=', $request->proyek)->update([

                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'luas_lahan' => $request->luas_lahan,
                'jumlah_unit' => $request->jumlah_unit,
                'gambar' => $request->gambar,
                'deskripsi' => $request->deskripsi,
                'updated_at' => date('Y-m-d H:i:s'),
                // 'updated_by' => Session::get('id');
                
            ]);
    
            $result = [
                'status' => 'success'
            ];
        
        return $result; 
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find proyek by ID
        $proyek = Proyek::findOrfail($id);

        if($proyek) {

            //delete proyek
            $proyek->deleted_at = date('Y-m-d H:i:s');
            // $proyek->deleted_by = Session::get('id');
            $proyek->save();

            return response()->json([
                'success' => true,
                'message' => 'Proyek Deleted',
            ], 200);

        }

        //data proyek not found
        return response()->json([
            'success' => false,
            'message' => 'Proyek Not Found',
        ], 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MitraController extends Controller
{    
    public function index()
    {
        //get data from table proyek
        $mitra = Mitra::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $mitra  
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
        $mitra = Mitra::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data mitra',
            'data'    => $mitra 
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
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'kota' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'kode_pos' => 'required',
                'no_hp' => 'required',
                'no_wa' => 'required',
                'nama_instansi' => 'required',
                'jabatan' => 'required',
                'kota_instansi' => 'required',
                'kode_pos_instansi' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $mitra = new Mitra(); 
            $mitra->nama = $request->nama; 
            $mitra->tempat_lahir = $request->tempat_lahir; 
            $mitra->tanggal_lahir = date('Y-m-d');
            $mitra->alamat = $request->alamat;
            $mitra->kota = $request->kota;
            $mitra->rt = $request->rt;
            $mitra->rw = $request->rw;
            $mitra->kode_pos = $request->kode_pos;
            $mitra->no_hp = $request->no_hp;
            $mitra->no_wa = $request->no_wa;
            $mitra->status_investor = $request->status_investor;
            $mitra->status_profesional = $request->status_profesional;
            $mitra->status_pengusaha = $request->status_pengusaha;
            $mitra->nama_instansi = $request->nama_instansi;
            $mitra->jabatan = $request->jabatan;
            $mitra->kota_instansi = $request->kota_instansi;
            $mitra->kode_pos_instansi = $request->kode_pos_instansi;
            $mitra->kemitraan_investasi = $request->kemitraan_investasi;
            $mitra->kemitraan_arisan_rumah = $request->kemitraan_arisan_rumah;
            $mitra->kemitraan_perencanaan_rumah = $request->kemitraan_perencanaan_rumah;
            $mitra->email = $request->email;
            $mitra->password = Hash::make($request->password); 

            // dd($request->password);
            $mitra->created_at = date('Y-m-d H:i:s');
            // $mitra->created_by = $request->created_by;
            $mitra->save(); 

            $result = [
                'status' => 'success',
                'message' => $mitra,
            ];
          

        return $result; 

    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\DaftarMitraArisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DaftarMitraArisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get data from table proyek
        $DaftarMitraArisan = DaftarMitraArisan::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $DaftarMitraArisan  
        ], 200);
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
        $request->validate([
            'mitra_id' => 'required',
            'patungan_arisan_id' => 'required',
            'kode' => 'required',
            'jumlah_slot' => 'required',
            'status_dana_disetor' => 'required',
            'metode_pembayaran' => 'required',
            'rekening_perusahaan_id' => 'required',
            'tanggal_pembayaran' => 'required',
            'dokumen_perjanjian' => 'required|mimes:doc,docx,pdf,txt,csv|max:2048',
            'dokumen_bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'nilai_setoran_per_bulan' => 'required',
            'tanggal_jatuh_tempo_setor' => 'required',
            
        ]);

        if($file = $request->file('dokumen_perjanjian'))
        {
            if($picture = $request->file('dokumen_bukti_pembayaran'))
            {
                $path = $picture->store('public/files');
                $explode = explode('/', $path);
                $implode = implode($explode);
                $tostr = substr($implode, 11);
            }
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();
        }
        // elseif()){
        //     dd($picture);
        //     $path = $picture->store('public/files');
        //     $explode = explode('/', $path);
        //     $implode = implode($explode);
        //     $tostr = substr($implode, 11);
        //     // $name = $picture->getClientOriginalName();
        // }
        // dd($request);

        $DaftarMitraArisan = new DaftarMitraArisan(); 

        // $DaftarMitraArisan->proyek_id = $request->proyek_id; 
        // dd($request->proyek_id);
        $DaftarMitraArisan->mitra_id = $request->mitra_id; 
        $DaftarMitraArisan->patungan_arisan_id = $request->patungan_arisan_id; 
        $DaftarMitraArisan->kode = $request->kode; 
        $DaftarMitraArisan->jumlah_slot = $request->jumlah_slot; 
        $DaftarMitraArisan->status_dana_disetor = $request->status_dana_disetor; 
        $DaftarMitraArisan->metode_pembayaran = $request->metode_pembayaran; 
        $DaftarMitraArisan->rekening_perusahaan_id = $request->rekening_perusahaan_id; 
        $DaftarMitraArisan->tanggal_pembayaran = date('Y-m-d');                 
        $DaftarMitraArisan->dokumen_perjanjian = $name;
        $DaftarMitraArisan->dokumen_bukti_pembayaran = $tostr;
        $DaftarMitraArisan->nilai_setoran_per_bulan = $request->nilai_setoran_per_bulan;
        $DaftarMitraArisan->tanggal_jatuh_tempo_setor = date('Y-m-d'); 
        

        // // dd($request->password);
        $DaftarMitraArisan->created_at = date('Y-m-d H:i:s');
        // $DaftarMitraArisan->created_by = $request->created_by;
        $DaftarMitraArisan->save(); 

        $result = [
            'status' => 'success',
            'message' => $DaftarMitraArisan,
        ];   
        // dd($result); die;       

    return $result; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //find proyek by ID
         $DaftarMitraArisan = DaftarMitraArisan::findOrfail($id);

         //make response JSON
         return response()->json([
             'success' => true,
             'message' => 'Detail Data Daftar Mitra Arisan',
             'data'    => $DaftarMitraArisan 
         ], 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

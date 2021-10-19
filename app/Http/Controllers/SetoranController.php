<?php

namespace App\Http\Controllers;

use App\Models\Setoran;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class SetoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get data from table proyek
        $Setoran = Setoran::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $Setoran  
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
            'daftar_mitra_patungan_id' => 'required',
            'metode_pembayaran' => 'required',
            'rekening_perusahaan_id' => 'required',
            'tanggal_pembayaran' => 'required',
            'dokument_bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            
            
        ]);

        if($gambar = $request->file('dokument_bukti_pembayaran')){
            $path = $gambar->store('public/files');
            $explode = explode('/', $path);
            $implode = implode($explode);
            $tostr = substr($implode, 11);
            // dd($tostr);
        }
        // dd($request);

        $Setoran = new Setoran(); 

        $Setoran->daftar_mitra_patungan_id = $request->daftar_mitra_patungan_id; 
        // dd($request->proyek_id);
        $Setoran->metode_pembayaran = $request->metode_pembayaran; 
        $Setoran->rekening_perusahaan_id = $request->rekening_perusahaan_id; 
       
        $Setoran->tanggal_pembayaran = date('Y-m-d');
        $Setoran->dokument_bukti_pembayaran = $tostr;
       
        

        // // dd($request->password);
        $Setoran->created_at = date('Y-m-d H:i:s');
        // $Setoran->created_by = $request->created_by;
        $Setoran->save(); 

        $result = [
            'status' => 'success',
            'message' => $Setoran,
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
        $Setoran = Setoran::findOrfail($id);
        
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Patungan Arisan',
            'data'    => $Setoran 
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
       //find proyek by ID
       $Setoran = Setoran::findOrfail($id);

       if($Setoran) {

           //delete proyek
           $Setoran->deleted_at = date('Y-m-d H:i:s');
           // $Setoran->deleted_by = Session::get('id');
           $Setoran->save();

           return response()->json([
               'success' => true,
               'message' => 'Setoran Deleted',
           ], 200);

       }

       //data proyek not found
       return response()->json([
           'success' => false,
           'message' => 'Proyek Not Found',
       ], 404);
    }

    public function getBukti($id)
    {
        $Setoran = DB::table('setoran_patungan_arisan as spa')
        //find proyek by ID
        // $Setoran = Setoran::findOrfail($id);
        ->select(DB::raw('
                        spa.id as patungan_arisan_id, 
                        spa.dokument_bukti_pembayaran as Bukti_Setor
                       
        '))
        
        ->where('spa.id',$id)
        ->first();

            //make response JSON
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Patungan Arisan',
                'data'    => $Setoran 
            ], 200);

    }

    public function Validation(Request $request, $id)
    {
        $request->validate([
            'daftar_mitra_patungan_id' => 'required',
            'metode_pembayaran' => 'required',
            'rekening_perusahaan_id' => 'required',
            'tanggal_pembayaran' => 'required',
            'dokument_bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            
            
        ]);

        if($gambar = $request->file('dokument_bukti_pembayaran')){
            $path = $gambar->store('public/files');
            $explode = explode('/', $path);
            $implode = implode($explode);
            $tostr = substr($implode, 11);
            // dd($tostr);
        }
        // dd($request);

        $Setoran = new Setoran(); 

        $Setoran->daftar_mitra_patungan_id = $request->daftar_mitra_patungan_id; 
        // dd($request->proyek_id);
        $Setoran->metode_pembayaran = $request->metode_pembayaran; 
        $Setoran->rekening_perusahaan_id = $request->rekening_perusahaan_id; 
       
        $Setoran->tanggal_pembayaran = date('Y-m-d');
        $Setoran->dokument_bukti_pembayaran = $tostr;
       
        

        // // dd($request->password);
        $Setoran->created_at = date('Y-m-d H:i:s');
        // $Setoran->created_by = $request->created_by;
        $Setoran->save(); 

        $result = [
            'status' => 'success',
            'message' => $Setoran,
        ];   
        // dd($result); die;       

    return $result; 
    }
}

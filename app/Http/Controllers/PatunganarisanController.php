<?php

namespace App\Http\Controllers;

use App\Models\Patunganarisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
// use lluminate\Database\QueryException;

class PatunganarisanController extends Controller
{    
    public function index()
    {
        //get data from table proyek
        $Patunganarisan = Patunganarisan::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $Patunganarisan  
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
        $Patunganarisan = Patunganarisan::findOrfail($id);
        
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Patungan Arisan',
            'data'    => $Patunganarisan 
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
                'proyek_id' => 'required',
                'nama' => 'required',
                'harga' => 'required',
                'jumlah_slot' => 'required',
                'durasi_waktu' => 'required',
                'tanggal_pengumpulan_mulai' => 'required',
                'tanggal_pengumpulan_selesai' => 'required',
                'tanggal_mulai_arisan' => 'required',
                'dokument_legalitas' => 'required|mimes:doc,docx,pdf,txt,csv|max:2048',
                'nilai_setoran_per_bulan' => 'required',
                'tanggal_jatuh_tempo_setor' => 'required',
                
            ]);

            if($file = $request->file('dokument_legalitas')){
               
                $path = $file->store('public/files');
                $name = $file->getClientOriginalName();
                // dd($tostr);
            }
            // dd($request);

            $Patunganarisan = new Patunganarisan(); 

            $Patunganarisan->proyek_id = $request->proyek_id; 
            // dd($request->proyek_id);
            $Patunganarisan->nama = $request->nama; 
            $Patunganarisan->harga = $request->harga; 
            $Patunganarisan->jumlah_slot = $request->jumlah_slot; 
            $Patunganarisan->durasi_waktu = $request->durasi_waktu; 
            $Patunganarisan->tanggal_pengumpulan_mulai = date('Y-m-d');
            $Patunganarisan->tanggal_pengumpulan_selesai = date('Y-m-d');                  
            $Patunganarisan->tanggal_mulai_arisan = date('Y-m-d');                  
            $Patunganarisan->dokument_legalitas = $name;
            $Patunganarisan->nilai_setoran_per_bulan = $request->nilai_setoran_per_bulan;
            $Patunganarisan->tanggal_jatuh_tempo_setor = date('Y-m-d'); 
            

            // // dd($request->password);
            $Patunganarisan->created_at = date('Y-m-d H:i:s');
            // $Patunganarisan->created_by = $request->created_by;
            $Patunganarisan->save(); 

            $result = [
                'status' => 'success',
                'message' => $Patunganarisan,
            ];   
            // dd($result); die;       

        return $result; 

    }

    public function update(Request $request)
    {
        
        if($file = $request->file('dokument_legalitas')){
               
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();
            // dd($tostr);
        }

        Patunganarisan::where('id', '=', $request->patunganarisan)->update([
                
            // dd($request->patunganarisan),
                'proyek_id' => $request->proyek_id,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'jumlah_slot' => $request->jumlah_slot,
                'durasi_waktu' => $request->durasi_waktu,
                'tanggal_pengumpulan_mulai' => date('Y-m-d'),
                'tanggal_pengumpulan_selesai' => date('Y-m-d'),
                'tanggal_mulai_arisan' => date('Y-m-d '),
                'dokument_legalitas' => $request->dokument_legalitas,
                'nilai_setoran_per_bulan' => $request->nilai_setoran_per_bulan,
                'tanggal_jatuh_tempo_setor' =>  date('Y-m-d'),
                'status_rilis' => $request->status_rilis,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $request->updated_by,
            ]);
            $result = [
                'status' => 'success'
            ];
           
        
        return $result; 
    }

    public function getProyekAll(Request $request)
    {
        $Patunganarisan = DB::table('patungan_arisan as pa')

        ->select(DB::raw('            
                    pa.id as patungan_arisan_id, 
                    pr.id as proyek_id,                    
                    pa.nama as patungan_arisan_nama,
                    pa.harga as patungan_arisan_harga,
                    pr.nama	 as proyek_nama
                '))
        ->leftjoin('proyek as pr', 'pa.proyek_id', '=', 'pr.id')        
        ->get();


        return $Patunganarisan;
        
    }

    public function getarisan($id)
    {
        $Patunganarisan = DB::table('patungan_arisan as pa')
        //find proyek by ID
        // $Patunganarisan = Patunganarisan::findOrfail($id);
        ->select(DB::raw('
                        pa.id as patungan_arisan_id, 
                        pr.id as proyek_id,                    
                        pa.nama as patungan_arisan_nama,
                        pa.harga as patungan_arisan_harga,
                        pr.nama	 as proyek_nama
    '))
    ->leftjoin('proyek as pr', 'pa.proyek_id', '=', 'pr.id')
    ->where('pa.id',$id)
    ->first();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Patungan Arisan',
            'data'    => $Patunganarisan 
        ], 200);

    }
    public function gettipe($id)
    {
        $Patunganarisan = DB::table('patungan_arisan as pa')
        //find proyek by ID
        // $Patunganarisan = Patunganarisan::findOrfail($id);
        ->select(DB::raw('
                        pa.id as patungan_arisan_id, 
                        pa.nama as patungan_arisan_nama,
                        pa.harga as patungan_arisan_harga,
                        pa.nilai_setoran_per_bulan as setor,
                        pad.id as patungan_arisan_detail_id,
                        pad.tipe as tipe_rumah
        '))
        ->leftjoin('patungan_arisan_detail as pad', 'pad.patungan_arisan_id', '=', 'pa.id')
        ->where('pa.id',$id)
        ->first();

            //make response JSON
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Patungan Arisan',
                'data'    => $Patunganarisan 
            ], 200);

    }

    // public function update(Request $request)
    // {
        

    //     Patunganarisan::where('id', '=', $request->patunganarisan)->update([
    //             dd($request->patunganarisan),
    //             // 'proyek_id' => $request->proyek_id,
    //                         'nama' => $request->nama,
    //                         // 'harga' => $request->harga,
    //                         // 'jumlah_slot' => $request->jumlah_slot,
    //                         // 'durasi_waktu' => $request->durasi_waktu,
    //                         // 'tanggal_pengumpulan_mulai' => date('Y-m-d '),
    //                         // 'tanggal_pengumpulan_selesai' => date('Y-m-d '),
    //                         // 'tanggal_mulai_arisan' => date('Y-m-d '),
    //                         // // 'dokument_legalitas' => $request->dokument_legalitas,
    //                         // 'nilai_setoran_per_bulan' => $request->nilai_setoran_per_bulan,
    //                         // 'tanggal_jatuh_tempo_setor' =>  date('Y-m-d '),
                            
    //                         // 'updated_at' => date('Y-m-d H:i:s'),
    //                         // 'updated_by' => $request->updated_by,
    //         ]);
    
    //         $result = [
    //             'status' => 'success',
    //             // 'message' => $request->patunganarisan,
    //         ];
        
    //     return $result; 
    // }

    public function destroy($id)
    {
        //find proyek by ID
        $Patunganarisan = Patunganarisan::findOrfail($id);

        if($Patunganarisan) {

            //delete Patunganarisan
            $Patunganarisan->deleted_at = date('Y-m-d H:i:s');
            // $Patunganarisan->deleted_by = Session::get('id');
            $Patunganarisan->save();

            return response()->json([
                'success' => true,
                'message' => 'patungan Deleted',
            ], 200);

        }

        //data proyek not found
        return response()->json([
            'success' => false,
            'message' => 'Proyek Not Found',
        ], 404);
    }

//     public function tayang($id)
// {
//     $tayang=DB::table('patungan_arisan')
//     ->select('tipe')
//     ->join('patungan_arisan_detail','patungan_arisan.id','=','patungan_arisan_detail.patungan_arisan_id')
//     ->join('bioskop','tayang.idBioskop','=','bioskop.idBioskop')
//     // ->join('film','tayang.idFilm','=','film.idFilm')
//     ->where('patungan_arisan.id','=',$id)->get();

//     return Response::json($tayang);
// }
    // public function tipe($id)
    // {
    //     $tipe=DB::table('patungan_arisan')
    //     ->select('tipe')
    //     ->join('tayang','patungan_arisan.id','=','patungan_arisan_detail.patungan_arisan_id')
    //     // ->join('bioskop','tayang.idBioskop','=','bioskop.idBioskop')
    //     // ->join('film','tayang.idFilm','=','film.idFilm')
    //     ->where('patungan_arisan_detail.patungan_arisan_id','=',$id)->get();

    //     return Response::json($tipe);
    // }
    // public function putRilis(Request $request,$id)
    // {
        
    //     $Patunganarisan = DB::table('patungan_arisan as pa')
    //     ->select(DB::raw('
    //                     pa.status_rilis as rilis
                        
    //     '))
       
    //     ->where('pa.id',$id)
    //     ->first();

    //     Patunganarisan::where('id', '=', $request->patunganarisan)->update([
                
            
    //             'status_rilis' => $request->status_rilis,
    //             'updated_at' => date('Y-m-d H:i:s'),
    //             'updated_by' => $request->updated_by,
    //         ]);
    //         $result = [
    //             'status' => 'success'
    //         ];
           
        
    //     return $result; 
    // }
    
}

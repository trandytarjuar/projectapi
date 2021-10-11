<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RekeningController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table proyek
        $rekening = Rekening::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $rekening  
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
        $rekening = Rekening::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Rekening',
            'data'    => $rekening 
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
                'bank_id' => 'required',
                'no_rekening' => 'required',
                'pemilik_rekening' => 'required',  
            ]);

            $rekening = new Rekening(); 
            $rekening->bank_id = $request->bank_id; 
            $rekening->no_rekening = $request->no_rekening; 
            $rekening->pemilik_rekening = $request->pemilik_rekening;
            $rekening->status_tampil = $request->status_tampil;
            $rekening->created_at = date('Y-m-d H:i:s');
            // $rekening->created_by = $request->created_by;
            $rekening->save(); 

            $result = [
                'status' => 'success',
                'message' => $rekening,
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
        

        Proyek::where('id', '=', $request->bank)->update([

                'nama' => $request->nama,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $request->updated_by,
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
        $bank = Bank::findOrfail($id);

        if($bank) {

            //delete proyek
            $bank->deleted_at = date('Y-m-d H:i:s');
            // $bank->deleted_by = Session::get('id');
            $bank->save();

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

<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table proyek
        $bank = Bank::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $bank  
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
        $bank = Bank::findOrfail($id);
        dd($bank);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Bank',
            'data'    => $bank 
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
            'nama_bank' => 'required',
        ]);

            $bank = new Bank(); 
            $bank->nama_bank = $request->nama_bank; 
            $bank->created_at = date('Y-m-d H:i:s');
            // $bank->created_by = $request->created_by;
            $bank->save(); 

            $result = [
                'status' => 'success',
                'message' => $bank,
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
        

        Bank::where('id', '=', $request->bank)->update([

                'nama_bank' => $request->nama_bank,
                'updated_at' => date('Y-m-d H:i:s'),
                // 'updated_by' => $request->updated_by,
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
                'message' => 'Bank Deleted',
            ], 200);

        }

        //data proyek not found
        return response()->json([
            'success' => false,
            'message' => 'Bank Not Found',
        ], 404);
    }
}

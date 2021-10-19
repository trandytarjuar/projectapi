<?php

namespace App\Http\Controllers;

use App\Models\PatunganarisanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatunganarisanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //get data from table proyek
       $PatunganarisanDetail = PatunganarisanDetail::latest()->get();

       //make response JSON
       return response()->json([
           'success' => true,
           'message' => 'List Data Post',
           'data'    => $PatunganarisanDetail  
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
        //
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
         $PatunganarisanDetail = PatunganarisanDetail::findOrfail($id);
        //  echo $request->id;
        //  echo $request->choices;
         //make response JSON
         return response()->json([
             'success' => true,
             'message' => 'Detail Data Patungan Arisan',
             'data'    => $PatunganarisanDetail 
         ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getTipe(Request $request) {
        // echo $request->id;
         $request->choices;
    }

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

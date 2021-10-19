<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\PatunganarisanDetailController;
use App\Http\Controllers\SetoranController;
use Illuminate\Models\Bank;
use Illuminate\Models\Rekening;
use Illuminate\Models\PatunganarisanDetail;
use Illuminate\Models\Setoran;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('/proyek','App\Http\Controllers\ProyekController@getProyek');
// Route::get('/proyek/{proyek_id}','App\Http\Controllers\ProyekController@getProyekById');
// Route::get('/patunganarisan/{id}','App\Http\Controllers\PatunganarisanController@tayang');
Route::get('/patunganarisan/proyek','App\Http\Controllers\PatunganarisanController@getProyekAll');
Route::get('/patunganarisan/proyekarisan/{id}','App\Http\Controllers\PatunganarisanController@getarisan');
Route::get('/patunganarisan/tipe/{id}','App\Http\Controllers\PatunganarisanController@gettipe');
Route::put('/patunganarisan/rilis/{id}','App\Http\Controllers\PatunganarisanController@putRilis');


Route::get('/setoran/bukti/{id}','App\Http\Controllers\SetoranController@getBukti');
// Route::get('/patunganarisandetail/{id}','App\Http\Controllers\PatunganarisanDetail@getTipe');









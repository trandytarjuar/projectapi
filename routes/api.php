<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('/proyek', ProyekController::class);
Route::resource('/bank', BankController::class);
Route::resource('/rekening', RekeningController::class);
Route::resource('/mitra', MitraController::class);
Route::resource('/patunganarisan', PatunganarisanController::class);
Route::resource('/daftarmitraarisan', DaftarMitraArisanController::class);
Route::resource('/setoran', SetoranController::class);
// Route::resource('/patunganarisandetail', Patunganarisan_detailController::class);
// Route::resource('/patunganarisandetail', Patunganarisan_detailController::class);


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TempFingerprintController;
use App\Http\Controllers\FingerprintController;
use App\Http\Controllers\MovimientosController;

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

Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home/search', [HomeController::class, 'search']);
//Rutas TempFingerprint
Route::post('/active_sensor_enroll', [TempFingerprintController::class, 'store_enroll']);
Route::post('/active_sensor_read', [TempFingerprintController::class, 'store_read']);
Route::post('/sensor_close', [TempFingerprintController::class, 'update']);
//Usuarios
Route::resource('/usuarios', UserController::class);
Route::get("/usuarios/{id}/finger-list", [UserController::class, "fingerList"])->name("finger-list");
Route::post("/usuarios/search", [UserController::class, "search"])->name("search");
Route::put("/usuarios/{usuario}/show_update", [UserController::class, "show_update"])->name("show_update");
//RecordUser
Route::post("/save_record", [UserController::class, "save_record"])->name("save_record");
Route::delete('/usuarios/{id}/delte-finger/{finger_id}',[UserController::class, 'deletFinger']);
//Fingerprint

Route::get("/get-finger/{id}", [FingerprintController::class, "index"])->name("get-finger");
Route::get("/check-in/{token}/{time}", [FingerprintController::class, "check_in"])->name("check_in");

//movimientos Activos

Route::get('/movimientosActivos', [MovimientosController::class, "index"]);
Route::get('/movimientos/create/{id}', [MovimientosController::class, "create"]);
Route::post('/movimientos/createMovimiento', [MovimientosController::class, "store"]);


Route::get('/Prueba', function(){
  return view("registro");
});
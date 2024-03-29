<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//mengirim data ke view
Route::get("/hallo", function(){
    $data = ['nama' => 'Nur Rachmat', 'npm' => '200925006', 'alamat' => 'Palembang'];
    return view("hallo", $data);
});

//menerima data/parameter dan menampilkannya di view
Route::get("/kenalan/{nama}/{npm}", function($nama, $npm){
    $data = ['nama' => $nama, 'npm' => $npm];
    return view("hallo", $data);
});


//Route ke halaman fakultas
Route::get("/fakultas", function(){
    $data = ["fakultas" => ["Fasilkom Rekayasa", "Fak. Ekonomi dan Bisnis"]];
    return view("fakultas.index", $data);
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

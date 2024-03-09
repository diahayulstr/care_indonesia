<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\DonorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('home', function () {
    return view('home');
});


Route::get('narahubung', [App\Http\Controllers\HomeController::class, 'narahubung'])->name('pages.narahubung');
Route::get('komunikasi', [App\Http\Controllers\HomeController::class, 'komunikasi'])->name('pages.komunikasi');
Route::get('proposal', [App\Http\Controllers\HomeController::class, 'proposal'])->name('pages.proposal');


Route::post('getkabupaten', [App\Http\Controllers\DonorController::class, 'getkabupaten'])->name('getkabupaten');
Route::post('getkecamatan', [App\Http\Controllers\DonorController::class, 'getkecamatan'])->name('getkecamatan');
Route::post('getdesa', [App\Http\Controllers\DonorController::class, 'getdesa'])->name('getdesa');

Route::get('donor', [App\Http\Controllers\DonorController::class, 'donor'])->name('pages.donor');
Route::get('donor/add', [App\Http\Controllers\DonorController::class, 'addDonor'])->name('donor.add');
Route::post('donor', [App\Http\Controllers\DonorController::class, 'store']);
Route::get('donor/{donor}', [App\Http\Controllers\DonorController::class, 'show'])->name('donor.view');
Route::get('donor/{donor}/edit/', [App\Http\Controllers\DonorController::class, 'edit'])->name('donor.edit');
Route::patch('donor/{donor}', [App\Http\Controllers\DonorController::class, 'update'])->name('donor.update');
Route::delete('donor/{donor}',[App\Http\Controllers\DonorController::class, 'destroy']);


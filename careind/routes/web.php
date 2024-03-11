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


Route::post('getkabupaten', [App\Http\Controllers\DonorController::class, 'getkabupaten'])->name('getkabupaten');
Route::post('getkecamatan', [App\Http\Controllers\DonorController::class, 'getkecamatan'])->name('getkecamatan');
Route::post('getdesa', [App\Http\Controllers\DonorController::class, 'getdesa'])->name('getdesa');

// DONOR
Route::get('donor', [App\Http\Controllers\DonorController::class, 'donor'])->name('pages.donor');
Route::get('donor/add', [App\Http\Controllers\DonorController::class, 'addDonor'])->name('donor.add');
Route::post('donor', [App\Http\Controllers\DonorController::class, 'store']);
Route::get('donor/{donor}', [App\Http\Controllers\DonorController::class, 'show'])->name('donor.view');
Route::get('donor/{donor}/edit/', [App\Http\Controllers\DonorController::class, 'edit'])->name('donor.edit');
Route::patch('donor/{donor}', [App\Http\Controllers\DonorController::class, 'update'])->name('donor.update');
Route::delete('donor/{donor}',[App\Http\Controllers\DonorController::class, 'destroy']);

// NARAHUBUNG
Route::get('narahubung', [App\Http\Controllers\NarahubungController::class, 'narahubung'])->name('pages.narahubung');
Route::get('narahubung/add', [App\Http\Controllers\NarahubungController::class, 'addNarahubung'])->name('narahubung.add');
Route::post('narahubung', [App\Http\Controllers\NarahubungController::class, 'store']);
Route::get('narahubung/{narahubung}', [App\Http\Controllers\NarahubungController::class, 'show'])->name('narahubung.view');
Route::get('narahubung/{narahubung}/edit/', [App\Http\Controllers\NarahubungController::class, 'edit'])->name('narahubung.edit');
Route::patch('narahubung/{narahubung}', [App\Http\Controllers\NarahubungController::class, 'update'])->name('narahubung.update');
Route::delete('narahubung/{narahubung}',[App\Http\Controllers\NarahubungController::class, 'destroy']);


// KOMUNIKASI
Route::get('komunikasi', [App\Http\Controllers\KomunikasiController::class, 'komunikasi'])->name('pages.komunikasi');
Route::get('komunikasi/add', [App\Http\Controllers\KomunikasiController::class, 'addKomunikasi'])->name('komunikasi.add');
Route::post('komunikasi', [App\Http\Controllers\KomunikasiController::class, 'store']);
Route::get('komunikasi/{komunikasi}', [App\Http\Controllers\KomunikasiController::class, 'show'])->name('komunikasi.view');
Route::get('komunikasi/{komunikasi}/edit', [App\Http\Controllers\KomunikasiController::class, 'edit'])->name('komunikasi.edit');
Route::patch('komunikasi/{komunikasi}', [App\Http\Controllers\KomunikasiController::class, 'update'])->name('komunikasi.update');
Route::delete('komunikasi/{komunikasi}', [App\Http\Controllers\KomunikasiController::class, 'destroy']);


// PROPOSAL
Route::get('proposal', [App\Http\Controllers\ProposalController::class, 'proposal'])->name('pages.proposal');
Route::get('proposal/add', [App\Http\Controllers\ProposalController::class, 'addProposal'])->name('proposal.add');
Route::post('proposal', [App\Http\Controllers\ProposalController::class, 'store']);

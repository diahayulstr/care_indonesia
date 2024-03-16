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

// IMPACT GOALS
Route::get('impact_goals', [App\Http\Controllers\HomeController::class, 'impact_goals'])->name('admin.impactGoals');
Route::post('impact_goals', [App\Http\Controllers\AdminController::class, 'store_impact_goals']);
Route::patch('impact_goals/{impact_goals}', [App\Http\Controllers\AdminController::class, 'update_impact_goals'])->name('admin.update_impact_goals');
Route::delete('impact_goals/{impact_goals}',[App\Http\Controllers\AdminController::class, 'destroy_impact_goals']);

// INTERMEDIARY
Route::get('jenis_intermediary', [App\Http\Controllers\HomeController::class, 'jenis_intermediaries'])->name('admin.jenisIntermediary');
Route::post('jenis_intermediary', [App\Http\Controllers\AdminController::class, 'store_jenis_intermediary']);
Route::patch('jenis_intermediary/{jenis_intermediary}', [App\Http\Controllers\AdminController::class, 'update_jenis_intermediary'])->name('admin.update_jenis_intermediary');
Route::delete('jenis_intermediary/{jenis_intermediary}',[App\Http\Controllers\AdminController::class, 'destroy_jenis_intermediary']);

// JENIS ORGANISASI
Route::get('jenis_organisasi', [App\Http\Controllers\HomeController::class, 'jenis_organisasi'])->name('admin.jenisOrganisasi');
Route::post('jenis_organisasi', [App\Http\Controllers\AdminController::class, 'store_jenis_organisasi']);
Route::patch('jenis_organisasi/{jenis_organisasi}', [App\Http\Controllers\AdminController::class, 'update_jenis_organisasi'])->name('admin.update_jenis_organisasi');
Route::delete('jenis_organisasi/{jenis_organisasi}',[App\Http\Controllers\AdminController::class, 'destroy_jenis_organisasi']);

// JENIS PENERIMAAN
Route::get('jenis_penerimaan', [App\Http\Controllers\HomeController::class, 'jenis_penerimaan'])->name('admin.jenisPenerimaan');
Route::post('jenis_penerimaan', [App\Http\Controllers\AdminController::class, 'store_jenis_penerimaan']);
Route::patch('jenis_penerimaan/{jenis_penerimaan}', [App\Http\Controllers\AdminController::class, 'update_jenis_penerimaan'])->name('admin.update_jenis_penerimaan');
Route::delete('jenis_penerimaan/{jenis_penerimaan}',[App\Http\Controllers\AdminController::class, 'destroy_jenis_penerimaan']);

// JENJANG KOMUNIKASI
Route::get('jenjang_komunikasi', [App\Http\Controllers\HomeController::class, 'jenjang_komunikasi'])->name('admin.jenjangKomunikasi');
Route::post('jenjang_komunikasi', [App\Http\Controllers\AdminController::class, 'store_jenjang_komunikasi']);
Route::patch('jenjang_komunikasi/{jenjang_komunikasi}', [App\Http\Controllers\AdminController::class, 'update_jenjang_komunikasi'])->name('admin.update_jenjang_komunikasi');
Route::delete('jenjang_komunikasi/{jenjang_komunikasi}',[App\Http\Controllers\AdminController::class, 'destroy_jenjang_komunikasi']);

// KLASIFIKASI PORTFOLIO
Route::get('klasifikasi_portfolio', [App\Http\Controllers\HomeController::class, 'klasifikasi_portfolio'])->name('admin.klasifikasiPortfolio');
Route::post('klasifikasi_portfolio', [App\Http\Controllers\AdminController::class, 'store_klasifikasi_portfolio']);
Route::patch('klasifikasi_portfolio/{klasifikasi_portfolio}', [App\Http\Controllers\AdminController::class, 'update_klasifikasi_portfolio'])->name('admin.update_klasifikasi_portfolio');
Route::delete('klasifikasi_portfolio/{klasifikasi_portfolio}',[App\Http\Controllers\AdminController::class, 'destroy_klasifikasi_portfolio']);

// KOMITMEN SDGS
Route::get('komitmen_sdgs', [App\Http\Controllers\HomeController::class, 'komitmen_sdgs'])->name('admin.komitmenSdgs');
Route::post('komitmen_sdgs', [App\Http\Controllers\AdminController::class, 'store_komitmen_sdgs']);
Route::patch('komitmen_sdgs/{komitmen_sdgs}', [App\Http\Controllers\AdminController::class, 'update_komitmen_sdgs'])->name('admin.update_komitmen_sdgs');
Route::delete('komitmen_sdgs/{komitmen_sdgs}',[App\Http\Controllers\AdminController::class, 'destroy_komitmen_sdgs']);

// SALURAN
Route::get('saluran', [App\Http\Controllers\HomeController::class, 'saluran'])->name('admin.saluran');
Route::post('saluran', [App\Http\Controllers\AdminController::class, 'store_saluran']);
Route::patch('saluran/{saluran}', [App\Http\Controllers\AdminController::class, 'update_saluran'])->name('admin.update_saluran');
Route::delete('saluran/{saluran}',[App\Http\Controllers\AdminController::class, 'destroy_saluran']);

// SALURAN PENDANAAN
Route::get('saluran_pendanaan', [App\Http\Controllers\HomeController::class, 'saluran_pendanaan'])->name('admin.saluranPendanaan');
Route::post('saluran_pendanaan', [App\Http\Controllers\AdminController::class, 'store_saluran_pendanaan']);
Route::patch('saluran_pendanaan/{saluran_pendanaan}', [App\Http\Controllers\AdminController::class, 'update_saluran_pendanaan'])->name('admin.update_saluran_pendanaan');
Route::delete('saluran_pendanaan/{saluran_pendanaan}',[App\Http\Controllers\AdminController::class, 'destroy_saluran_pendanaan']);

// STATUS
Route::get('status', [App\Http\Controllers\HomeController::class, 'status'])->name('admin.status');
Route::post('status', [App\Http\Controllers\AdminController::class, 'store_status']);
Route::patch('status/{status}', [App\Http\Controllers\AdminController::class, 'update_status'])->name('admin.update_status');
Route::delete('status/{status}',[App\Http\Controllers\AdminController::class, 'destroy_status']);

// STATUS KEMAJUAN
Route::get('status_kemajuan', [App\Http\Controllers\HomeController::class, 'status_kemajuan'])->name('admin.statusKemajuan');
Route::post('status_kemajuan', [App\Http\Controllers\AdminController::class, 'store_status_kemajuan']);
Route::patch('status_kemajuan/{status_kemajuan}', [App\Http\Controllers\AdminController::class, 'update_status_kemajuan'])->name('admin.update_status_kemajuan');
Route::delete('status_kemajuan/{status_kemajuan}',[App\Http\Controllers\AdminController::class, 'destroy_status_kemajuan']);

// TINDAK LANJUT
Route::get('tindak_lanjut', [App\Http\Controllers\HomeController::class, 'tindak_lanjut'])->name('admin.tindakLanjut');
Route::post('tindak_lanjut', [App\Http\Controllers\AdminController::class, 'store_tindak_lanjut']);
Route::patch('tindak_lanjut/{tindak_lanjut}', [App\Http\Controllers\AdminController::class, 'update_tindak_lanjut'])->name('admin.update_tindak_lanjut');
Route::delete('tindak_lanjut/{tindak_lanjut}',[App\Http\Controllers\AdminController::class, 'destroy_tindak_lanjut']);

// TUJUAN PENDANAAN
Route::get('tujuan_pendanaan', [App\Http\Controllers\HomeController::class, 'tujuan_pendanaan'])->name('admin.tujuanPendanaan');
Route::post('tujuan_pendanaan', [App\Http\Controllers\AdminController::class, 'store_tujuan_pendanaan']);
Route::patch('tujuan_pendanaan/{tujuan_pendanaan}', [App\Http\Controllers\AdminController::class, 'update_tujuan_pendanaan'])->name('admin.update_tujuan_pendanaan');
Route::delete('tujuan_pendanaan/{tujuan_pendanaan}',[App\Http\Controllers\AdminController::class, 'destroy_tujuan_pendanaan']);


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
Route::get('proposal/{proposal}', [App\Http\Controllers\ProposalController::class, 'show'])->name('proposal.view');
Route::get('proposal/{proposal}/edit', [App\Http\Controllers\ProposalController::class, 'edit'])->name('proposal.edit');
Route::patch('proposal/{proposal}', [App\Http\Controllers\ProposalController::class, 'update'])->name('proposal.update');
Route::delete('proposal/{proposal}', [App\Http\Controllers\ProposalController::class, 'destroy']);

// MASTER ADD
Route::get('master/add', [App\Http\Controllers\MasterController::class, 'master_add'])->name('donor.master.add_master');
Route::get('master/{master}', [App\Http\Controllers\MasterController::class, 'master_show'])->name('donor.master.view_master');
Route::get('master/{master}/edit', [App\Http\Controllers\MasterController::class, 'master_edit'])->name('donor.master.edit_master');

Route::post('master/master_narahubung', [App\Http\Controllers\MasterController::class, 'store_narahubung']);
Route::patch('master/master_narahubung/{master_narahubung}', [App\Http\Controllers\MasterController::class, 'update_narahubung'])->name('master.update_narahubung');
Route::delete('master_narahubung/{master_narahubung}', [App\Http\Controllers\MasterController::class, 'destroy_narahubung']);

Route::patch('master_komunikasi/{master_komunikasi}', [App\Http\Controllers\MasterController::class, 'store_komunikasi']);
Route::delete('master_komunikasi/{master_komunikasi}', [App\Http\Controllers\MasterController::class, 'destroy_komunikasi']);

Route::patch('master_proposal/{master_proposal}', [App\Http\Controllers\MasterController::class, 'store_proposal']);


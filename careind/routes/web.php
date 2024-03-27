<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\KomunikasiController;
use App\Http\Controllers\NarahubungController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

// LOGIN LOGOUT
Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authentication'])->name('login.authentication')->middleware('guest');
Route::get('logout', [AuthController::class, 'logout'])->name('login.logout')->middleware('auth');

// HOME
Route::get('home', [HomeController::class, 'home'])->name('home')->middleware('auth');

// USER
Route::get('user', [HomeController::class, 'user'])->name('admin.user')->middleware('auth');
Route::post('user', [AdminController::class, 'store_user'])->middleware('auth');
Route::patch('user/{user}', [AdminController::class, 'update_user'])->name('admin.update_user')->middleware('auth');
Route::delete('user/{user}',[AdminController::class, 'destroy_user'])->middleware('auth');

// IMPACT GOALS
Route::get('impact_goals', [HomeController::class, 'impact_goals'])->name('admin.impactGoals')->middleware(['auth', 'must-admin']);
Route::post('impact_goals', [AdminController::class, 'store_impact_goals'])->middleware(['auth', 'must-admin']);
Route::patch('impact_goals/{impact_goals}', [AdminController::class, 'update_impact_goals'])->name('admin.update_impact_goals')->middleware(['auth', 'must-admin']);
Route::delete('impact_goals/{impact_goals}',[AdminController::class, 'destroy_impact_goals'])->middleware(['auth', 'must-admin']);

// INTERMEDIARY
Route::get('jenis_intermediary', [HomeController::class, 'jenis_intermediaries'])->name('admin.jenisIntermediary')->middleware(['auth', 'must-admin']);
Route::post('jenis_intermediary', [AdminController::class, 'store_jenis_intermediary'])->middleware(['auth', 'must-admin']);
Route::patch('jenis_intermediary/{jenis_intermediary}', [AdminController::class, 'update_jenis_intermediary'])->name('admin.update_jenis_intermediary')->middleware(['auth', 'must-admin']);
Route::delete('jenis_intermediary/{jenis_intermediary}',[AdminController::class, 'destroy_jenis_intermediary'])->middleware(['auth', 'must-admin']);

// JENIS ORGANISASI
Route::get('jenis_organisasi', [HomeController::class, 'jenis_organisasi'])->name('admin.jenisOrganisasi')->middleware(['auth', 'must-admin']);
Route::post('jenis_organisasi', [AdminController::class, 'store_jenis_organisasi'])->middleware(['auth', 'must-admin']);
Route::patch('jenis_organisasi/{jenis_organisasi}', [AdminController::class, 'update_jenis_organisasi'])->name('admin.update_jenis_organisasi')->middleware(['auth', 'must-admin']);
Route::delete('jenis_organisasi/{jenis_organisasi}',[AdminController::class, 'destroy_jenis_organisasi'])->middleware(['auth', 'must-admin']);

// JENIS PENERIMAAN
Route::get('jenis_penerimaan', [HomeController::class, 'jenis_penerimaan'])->name('admin.jenisPenerimaan')->middleware(['auth', 'must-admin']);
Route::post('jenis_penerimaan', [AdminController::class, 'store_jenis_penerimaan'])->middleware(['auth', 'must-admin']);
Route::patch('jenis_penerimaan/{jenis_penerimaan}', [AdminController::class, 'update_jenis_penerimaan'])->name('admin.update_jenis_penerimaan')->middleware(['auth', 'must-admin']);
Route::delete('jenis_penerimaan/{jenis_penerimaan}',[AdminController::class, 'destroy_jenis_penerimaan'])->middleware(['auth', 'must-admin']);

// JENJANG KOMUNIKASI
Route::get('jenjang_komunikasi', [HomeController::class, 'jenjang_komunikasi'])->name('admin.jenjangKomunikasi')->middleware(['auth', 'must-admin']);
Route::post('jenjang_komunikasi', [AdminController::class, 'store_jenjang_komunikasi'])->middleware(['auth', 'must-admin']);
Route::patch('jenjang_komunikasi/{jenjang_komunikasi}', [AdminController::class, 'update_jenjang_komunikasi'])->name('admin.update_jenjang_komunikasi')->middleware(['auth', 'must-admin']);
Route::delete('jenjang_komunikasi/{jenjang_komunikasi}',[AdminController::class, 'destroy_jenjang_komunikasi'])->middleware(['auth', 'must-admin']);

// KLASIFIKASI PORTFOLIO
Route::get('klasifikasi_portfolio', [HomeController::class, 'klasifikasi_portfolio'])->name('admin.klasifikasiPortfolio')->middleware(['auth', 'must-admin']);
Route::post('klasifikasi_portfolio', [AdminController::class, 'store_klasifikasi_portfolio'])->middleware(['auth', 'must-admin']);
Route::patch('klasifikasi_portfolio/{klasifikasi_portfolio}', [AdminController::class, 'update_klasifikasi_portfolio'])->name('admin.update_klasifikasi_portfolio')->middleware(['auth', 'must-admin']);
Route::delete('klasifikasi_portfolio/{klasifikasi_portfolio}',[AdminController::class, 'destroy_klasifikasi_portfolio'])->middleware(['auth', 'must-admin']);

// KOMITMEN SDGS
Route::get('komitmen_sdgs', [HomeController::class, 'komitmen_sdgs'])->name('admin.komitmenSdgs')->middleware(['auth', 'must-admin']);
Route::post('komitmen_sdgs', [AdminController::class, 'store_komitmen_sdgs'])->middleware(['auth', 'must-admin']);
Route::patch('komitmen_sdgs/{komitmen_sdgs}', [AdminController::class, 'update_komitmen_sdgs'])->name('admin.update_komitmen_sdgs')->middleware(['auth', 'must-admin']);
Route::delete('komitmen_sdgs/{komitmen_sdgs}',[AdminController::class, 'destroy_komitmen_sdgs'])->middleware(['auth', 'must-admin']);

// SALURAN
Route::get('saluran', [HomeController::class, 'saluran'])->name('admin.saluran')->middleware(['auth', 'must-admin']);
Route::post('saluran', [AdminController::class, 'store_saluran'])->middleware(['auth', 'must-admin']);
Route::patch('saluran/{saluran}', [AdminController::class, 'update_saluran'])->name('admin.update_saluran')->middleware(['auth', 'must-admin']);
Route::delete('saluran/{saluran}',[AdminController::class, 'destroy_saluran'])->middleware(['auth', 'must-admin']);

// SALURAN PENDANAAN
Route::get('saluran_pendanaan', [HomeController::class, 'saluran_pendanaan'])->name('admin.saluranPendanaan')->middleware(['auth', 'must-admin']);
Route::post('saluran_pendanaan', [AdminController::class, 'store_saluran_pendanaan'])->middleware(['auth', 'must-admin']);
Route::patch('saluran_pendanaan/{saluran_pendanaan}', [AdminController::class, 'update_saluran_pendanaan'])->name('admin.update_saluran_pendanaan')->middleware(['auth', 'must-admin']);
Route::delete('saluran_pendanaan/{saluran_pendanaan}',[AdminController::class, 'destroy_saluran_pendanaan'])->middleware(['auth', 'must-admin']);

// STATUS
Route::get('status', [HomeController::class, 'status'])->name('admin.status')->middleware(['auth', 'must-admin']);
Route::post('status', [AdminController::class, 'store_status'])->middleware(['auth', 'must-admin']);
Route::patch('status/{status}', [AdminController::class, 'update_status'])->name('admin.update_status')->middleware(['auth', 'must-admin']);
Route::delete('status/{status}',[AdminController::class, 'destroy_status'])->middleware(['auth', 'must-admin']);

// STATUS KEMAJUAN
Route::get('status_kemajuan', [HomeController::class, 'status_kemajuan'])->name('admin.statusKemajuan')->middleware(['auth', 'must-admin']);
Route::post('status_kemajuan', [AdminController::class, 'store_status_kemajuan'])->middleware(['auth', 'must-admin']);
Route::patch('status_kemajuan/{status_kemajuan}', [AdminController::class, 'update_status_kemajuan'])->name('admin.update_status_kemajuan')->middleware(['auth', 'must-admin']);
Route::delete('status_kemajuan/{status_kemajuan}',[AdminController::class, 'destroy_status_kemajuan'])->middleware(['auth', 'must-admin']);

// TINDAK LANJUT
Route::get('tindak_lanjut', [HomeController::class, 'tindak_lanjut'])->name('admin.tindakLanjut')->middleware(['auth', 'must-admin']);
Route::post('tindak_lanjut', [AdminController::class, 'store_tindak_lanjut'])->middleware(['auth', 'must-admin']);
Route::patch('tindak_lanjut/{tindak_lanjut}', [AdminController::class, 'update_tindak_lanjut'])->name('admin.update_tindak_lanjut')->middleware(['auth', 'must-admin']);
Route::delete('tindak_lanjut/{tindak_lanjut}',[AdminController::class, 'destroy_tindak_lanjut'])->middleware(['auth', 'must-admin']);

// TUJUAN PENDANAAN
Route::get('tujuan_pendanaan', [HomeController::class, 'tujuan_pendanaan'])->name('admin.tujuanPendanaan')->middleware(['auth', 'must-admin']);
Route::post('tujuan_pendanaan', [AdminController::class, 'store_tujuan_pendanaan'])->middleware(['auth', 'must-admin']);
Route::patch('tujuan_pendanaan/{tujuan_pendanaan}', [AdminController::class, 'update_tujuan_pendanaan'])->name('admin.update_tujuan_pendanaan')->middleware(['auth', 'must-admin']);
Route::delete('tujuan_pendanaan/{tujuan_pendanaan}',[AdminController::class, 'destroy_tujuan_pendanaan'])->middleware(['auth', 'must-admin']);


Route::post('getkabupaten', [DonorController::class, 'getkabupaten'])->name('getkabupaten')->middleware(['auth', 'must-admin']);
Route::post('getkecamatan', [DonorController::class, 'getkecamatan'])->name('getkecamatan')->middleware(['auth', 'must-admin']);
Route::post('getdesa', [DonorController::class, 'getdesa'])->name('getdesa')->middleware(['auth', 'must-admin']);

// DONOR
Route::get('donor', [DonorController::class, 'donor'])->name('pages.donor')->middleware('auth');
Route::get('donor/add', [DonorController::class, 'addDonor'])->name('donor.add')->middleware(['auth', 'must-admin']);
Route::post('donor', [DonorController::class, 'store'])->middleware(['auth', 'must-admin']);
Route::get('donor/{donor}', [DonorController::class, 'show'])->name('donor.view')->middleware('auth');
Route::get('donor/{donor}/edit/', [DonorController::class, 'edit'])->name('donor.edit')->middleware(['auth', 'must-admin']);
Route::patch('donor/{donor}', [DonorController::class, 'update'])->name('donor.update')->middleware(['auth', 'must-admin']);
Route::delete('donor/{donor}',[DonorController::class, 'destroy'])->middleware(['auth', 'must-admin']);

// NARAHUBUNG
Route::get('narahubung', [NarahubungController::class, 'narahubung'])->name('pages.narahubung')->middleware('auth');
Route::get('narahubung/add', [NarahubungController::class, 'addNarahubung'])->name('narahubung.add')->middleware(['auth', 'must-admin']);
Route::post('narahubung', [NarahubungController::class, 'store'])->middleware(['auth', 'must-admin']);
Route::get('narahubung/{narahubung}', [NarahubungController::class, 'show'])->name('narahubung.view')->middleware('auth');
Route::get('narahubung/{narahubung}/edit/', [NarahubungController::class, 'edit'])->name('narahubung.edit')->middleware(['auth', 'must-admin']);
Route::patch('narahubung/{narahubung}', [NarahubungController::class, 'update'])->name('narahubung.update')->middleware(['auth', 'must-admin']);
Route::delete('narahubung/{narahubung}',[NarahubungController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::get('grid_add/narahubung', [NarahubungController::class, 'grid_add_narahubung'])->name('narahubung.gridAdd')->middleware(['auth', 'must-admin']);


// KOMUNIKASI
Route::get('komunikasi', [KomunikasiController::class, 'komunikasi'])->name('pages.komunikasi')->middleware('auth');
Route::get('komunikasi/add', [KomunikasiController::class, 'addKomunikasi'])->name('komunikasi.add')->middleware(['auth', 'must-admin']);
Route::post('komunikasi', [KomunikasiController::class, 'store'])->middleware(['auth', 'must-admin']);
Route::get('komunikasi/{komunikasi}', [KomunikasiController::class, 'show'])->name('komunikasi.view')->middleware('auth');
Route::get('komunikasi/{komunikasi}/edit', [KomunikasiController::class, 'edit'])->name('komunikasi.edit')->middleware(['auth', 'must-admin']);
Route::patch('komunikasi/{komunikasi}', [KomunikasiController::class, 'update'])->name('komunikasi.update')->middleware(['auth', 'must-admin']);
Route::delete('komunikasi/{komunikasi}', [KomunikasiController::class, 'destroy'])->middleware(['auth', 'must-admin']);

// PROPOSAL
Route::get('proposal', [ProposalController::class, 'proposal'])->name('pages.proposal')->middleware('auth');
Route::get('proposal/add', [ProposalController::class, 'addProposal'])->name('proposal.add')->middleware(['auth', 'must-admin']);
Route::post('proposal', [ProposalController::class, 'store'])->middleware(['auth', 'must-admin']);
Route::get('proposal/{proposal}', [ProposalController::class, 'show'])->name('proposal.view')->middleware('auth');
Route::get('proposal/{proposal}/edit', [ProposalController::class, 'edit'])->name('proposal.edit')->middleware(['auth', 'must-admin']);
Route::patch('proposal/{proposal}', [ProposalController::class, 'update'])->name('proposal.update')->middleware(['auth', 'must-admin']);
Route::delete('proposal/{proposal}', [ProposalController::class, 'destroy'])->middleware(['auth', 'must-admin']);

// MASTER ADD
Route::get('master/add', [MasterController::class, 'master_add'])->name('donor.master.add_master')->middleware(['auth', 'must-admin']);
Route::post('master/add', [MasterController::class, 'store_master_add'])->middleware(['auth', 'must-admin']);
Route::get('master/{master}', [MasterController::class, 'master_show'])->name('donor.master.view_master')->middleware('auth');
Route::get('master/{master}/edit', [MasterController::class, 'master_edit'])->name('donor.master.edit_master')->middleware(['auth', 'must-admin']);
Route::patch('master/{master}', [MasterController::class, 'update_master_add'])->name('master.update_master_add')->middleware(['auth', 'must-admin']);
Route::delete('master/{master}/narahubung', [MasterController::class, 'destroy_master_narahubung'])->name('master.destroy_master_narahubung')->middleware(['auth', 'must-admin']);
Route::delete('master/{master}/komunikasi', [MasterController::class, 'destroy_master_komunikasi'])->name('master.destroy_master_komunikasi')->middleware(['auth', 'must-admin']);
Route::delete('master/{master}/proposal', [MasterController::class, 'destroy_master_proposal'])->name('master.destroy_master_proposal')->middleware(['auth', 'must-admin']);


Route::post('/master/{donor_id}/narahubung', [MasterController::class,'storeOrUpdate_narahubung'])->name('master.storeOrUpdate_narahubung')->middleware(['auth', 'must-admin']);
Route::delete('master_narahubung/{master_narahubung}', [MasterController::class, 'destroy_narahubung'])->middleware(['auth', 'must-admin']);


Route::post('/master/{donor_id}/komunikasi', [MasterController::class,'storeOrUpdate_komunikasi'])->name('master.storeOrUpdate_komunikasi')->middleware(['auth', 'must-admin']);
Route::delete('master_komunikasi/{master_komunikasi}', [MasterController::class, 'destroy_komunikasi'])->middleware(['auth', 'must-admin']);


Route::post('/master/{donor_id}/proposal', [MasterController::class,'storeOrUpdate_proposal'])->name('master.storeOrUpdate_proposal')->middleware(['auth', 'must-admin']);
Route::delete('master_proposal/{master_proposal}', [MasterController::class, 'destroy_proposal'])->middleware(['auth', 'must-admin']);


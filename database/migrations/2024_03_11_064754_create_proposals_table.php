<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donor_id');
            $table->unsignedBigInteger('tujuan_pendanaan_id');
            $table->unsignedBigInteger('jenis_penerimaan_id');
            $table->unsignedBigInteger('saluran_pendanaan_id');
            $table->unsignedBigInteger('jenis_intermediaries_id');
            $table->string('nama_proyek');
            $table->unsignedBigInteger('klasifikasi_portfolio_id');
            $table->json('impact_goals_id');
            $table->string('estimasi_nilai_usd');
            $table->string('estimasi_nilai_idr');
            $table->string('usulan_durasi');
            $table->unsignedBigInteger('status_kemajuan_id');
            $table->string('dokumen');
            $table->timestamps();
        });

        Schema::table('proposals', function(Blueprint $table){
            $table->foreign('donor_id')
                    ->references('id')->on('donors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tujuan_pendanaan_id')
                    ->references('id')->on('tabel_tujuan_pendanaans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_penerimaan_id')
                    ->references('id')->on('tabel_jenis_penerimaans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('saluran_pendanaan_id')
                    ->references('id')->on('tabel_Saluran_pendanaans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_intermediaries_id')
                    ->references('id')->on('tabel_jenis_intermediaries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('klasifikasi_portfolio_id')
                    ->references('id')->on('tabel_klasifikasi_portfolios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_kemajuan_id')
                    ->references('id')->on('tabel_status_kemajuans')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};

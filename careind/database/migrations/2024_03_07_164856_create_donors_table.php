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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_organisasi');
            $table->string('alamat');
            $table->string('negara');
            $table->string('provinsi_id');
            $table->string('kabupaten_id');
            $table->string('kecamatan_id');
            $table->string('desa_id');
            $table->string('website');
            $table->string('informasi_singkat');
            $table->unsignedBigInteger('jenis_organisasi_id');
            $table->unsignedBigInteger('komitmen_sdgs_id');
            $table->date('date');
            $table->string('dokumen');
            $table->timestamps();
        });

        Schema::table('donors', function(Blueprint $table){
            $table->foreign('provinsi_id')->references('id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kabupaten_id')->references('id')->on('regencies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kecamatan_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('desa_id')->references('id')->on('villages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_organisasi_id')->references('id')->on('tabel_jenis_organisasis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('komitmen_sdgs_id')->references('id')->on('tabel_komitmen_sdgs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};

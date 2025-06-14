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
        Schema::create('komunikasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donor_id');
            $table->date('tanggal');
            $table->unsignedBigInteger('saluran_id');
            $table->unsignedBigInteger('jenjang_komunikasi_id');
            $table->unsignedBigInteger('tindak_lanjut_id');
            $table->string('catatan');
            $table->date('tgl_selanjutnya');
            $table->string('dokumen');
            $table->timestamps();
        });

        Schema::table('komunikasis', function(Blueprint $table){
            $table->foreign('donor_id')->references('id')->on('donors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('saluran_id')->references('id')->on('tabel_salurans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenjang_komunikasi_id')->references('id')->on('tabel_jenjang_komunikasis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tindak_lanjut_id')->references('id')->on('tabel_tindak_lanjuts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komunikasis');
    }
};

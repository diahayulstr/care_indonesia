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
        Schema::create('narahubungs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donor_id');
            $table->string('nama_kontak');
            $table->string('jabatan');
            $table->string('email');
            $table->string('no_telp');
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
        });

        Schema::table('narahubungs', function(Blueprint $table){
            $table->foreign('donor_id')->references('id')->on('donors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('tabel_statuses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('narahubung');
    }
};

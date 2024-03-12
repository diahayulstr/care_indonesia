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

        Schema::table('donors', function (Blueprint $table) {
            // Drop foreign key
            $table->dropForeign(['komitmen_sdgs_id']);

            // Drop existing column
            $table->dropColumn('komitmen_sdgs_id');

            // Add new JSON column
            $table->json('komitmen_sdgs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donors', function (Blueprint $table) {
            // Drop new JSON column
            $table->dropColumn('komitmen_sdgs');

            // Add back the column with previous type
            $table->unsignedBigInteger('komitmen_sdgs_id');

            // Add foreign key
            $table->foreign('komitmen_sdgs_id')->references('id')->on('tabel_komitmen_sdgs')->onDelete('cascade');
        });
    }
};

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
        DB::statement('ALTER TABLE donors CHANGE COLUMN dokumen dokumen_donor VARCHAR(255)');
        DB::statement('ALTER TABLE komunikasis CHANGE COLUMN dokumen dokumen_komunikasi VARCHAR(255)');
        DB::statement('ALTER TABLE proposals CHANGE COLUMN dokumen dokumen_proposal VARCHAR(255)');
    }

/**
 * Reverse the migrations.
 */
    public function down(): void
    {
        DB::statement('ALTER TABLE donors CHANGE COLUMN dokumen_donor dokumen VARCHAR(255)');
        DB::statement('ALTER TABLE komunikasis CHANGE COLUMN dokumen_komunikasi dokumen VARCHAR(255)');
        DB::statement('ALTER TABLE proposals CHANGE COLUMN dokumen_proposal dokumen VARCHAR(255)');
    }


};

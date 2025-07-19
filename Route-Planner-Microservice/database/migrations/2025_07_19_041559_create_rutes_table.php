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
        Schema::create('rute', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rute', 100);
            $table->smallInteger('halte_id_asal');
            $table->smallInteger('halte_id_tujuan');
            $table->string('halte_id_transit')->nullable();
            $table->smallInteger('jarak_tempuh')->nullable();
            $table->smallInteger('jumlah_armada')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rute');
    }
};

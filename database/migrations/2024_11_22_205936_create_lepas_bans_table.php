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
        Schema::create('lepas_bans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabang_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ban_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kendaraan_id')->constrained()->cascadeOnDelete();
            $table->date('tanggal_pelepasan');
            $table->string('posisi_ban');
            $table->string('status_ban_lepas');
            $table->string('status_sebelum_lepas')->nullable();
            $table->string('tindakan_akhir')->nullable();
            $table->integer('vulkanisir_ke')->nullable();
            $table->string('ketebalan_sebelum_lepas')->nullable();
            $table->date('tgl_ketebalan_sebelum_lepas')->nullable();
            $table->string('ketebalan_lepas')->nullable();
            $table->string('alasan_lepas')->nullable();
            $table->string('supplier_ban')->nullable();
            $table->bigInteger('km_akhir')->nullable();
            $table->bigInteger('km_pasang')->nullable();
            $table->bigInteger('km_tempuh')->nullable();
            $table->string('ketebalan_pasang')->nullable();
            $table->date('tanggal_pasang_ban')->nullable();
            $table->string('ukuran_ban')->nullable();
            $table->string('konsumsi_ketebalan')->nullable();
            $table->integer('waktu_pakai_ban')->nullable();
            $table->integer('umur_ban')->nullable();
            $table->string('jenis_telapak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lepas_bans');
    }
};

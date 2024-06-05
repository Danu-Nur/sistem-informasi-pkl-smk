<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pkl_id')->nullable()->constrained('tb_pkl')->onDelete('set null');
            $table->foreignId('siswa_id')->nullable()->constrained('tb_siswa')->onDelete('set null');
            $table->foreignId('jadwal_id')->nullable()->constrained('tb_jadwal')->onDelete('set null');
            $table->foreignId('absensi_id')->nullable()->constrained('tb_absensi')->onDelete('set null');
            $table->string('dokumentasi')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kegiatan');
    }
}

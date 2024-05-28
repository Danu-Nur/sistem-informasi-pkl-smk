<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->nullable()->constrained('tb_siswa')->onDelete('set null');
            $table->foreignId('pkl_id')->nullable()->constrained('tb_pkl')->onDelete('set null');
            $table->foreignId('jadwal_id')->nullable()->constrained('tb_jadwal')->onDelete('set null');
            $table->dateTime('waktu_absen')->nullable();
            $table->string('status_absen')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('lokasi_absen')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('tb_absensi');
    }
}

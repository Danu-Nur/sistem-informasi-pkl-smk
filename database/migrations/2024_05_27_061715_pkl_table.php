<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PklTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pkl', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pkl')->nullable();
            $table->text('Alamat_pkl')->nullable();
            $table->text('lokasi_pkl')->nullable();
            $table->foreignId('siswa_id')->nullable()->constrained('tb_siswa')->onDelete('set null');
            $table->foreignId('psekolah_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('pindustri_id')->nullable()->constrained('users')->onDelete('set null');
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
        Schema::dropIfExists('tb_pkl');
    }
}

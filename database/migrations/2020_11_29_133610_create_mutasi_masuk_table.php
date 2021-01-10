<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasiMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi_masuk', function (Blueprint $table) {
            $table->bigIncrements('id_mut_msk');
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id_siswa')->on('peserta_didik');
            $table->string('no_srt_pindah', 30);
            $table->string('asal_sekolah', 50);
            $table->enum('tingkat_kelas', ["X", "XI", "XII"]);
            $table->date('tgl_masuk');
            $table->text('alasan_pindah');
            $table->integer('status_mutasi')-> unsigned();
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
        Schema::dropIfExists('mutasi_masuk');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaDidikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_didik', function (Blueprint $table) {
            $table->bigIncrements('id_siswa');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('nm_siswa', 50);
            $table->enum('jns_kelamin', ["Laki - Laki", "Perempuan"]);
            $table->integer('nis')->unique();
            $table->string('tmp_lahir', 20);
            $table->date('tgl_lahir');
            $table->string('agama', 20);
            $table->text('alamat_siswa', 50);
            $table->string('provinsi', 50);
            $table->string('kabupaten', 50);
            $table->string('no_tlpn', 15);
            $table->string('email', 30);
            $table->string('tahun_ajaran', 20);
            $table->enum('jurusan', ["IPA", "IPS"]);
            $table->integer('sts_siswa')->unsigned();
            $table->string('keterangan', 50);
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
        Schema::dropIfExists('peserta_didik');
    }
}

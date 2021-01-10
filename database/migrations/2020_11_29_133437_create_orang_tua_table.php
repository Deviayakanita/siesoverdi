<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrangTuaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orang_tua', function (Blueprint $table) {
            $table->bigIncrements('id_orang_tua');
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id_siswa')->on('peserta_didik');
            $table->string('nm_ayah', 50);
            $table->string('job_ayah', 50);
            $table->string('pddk_ayah', 10);
            $table->enum('penghasilan_ayah',["Kurang dari Rp.500,000", "Rp.500,000 - Rp.1,000,000",
            "Rp.1,000,000 - Rp.2,000,000", "Rp.2,000,000 - Rp.5,000,000", "Rp.5,000,000 - Rp.20,000,000","Lebih dari Rp.20,000,000","Tidak Penghasilan"]);
            $table->string('nm_ibu', 50);
            $table->string('job_ibu', 50);
            $table->string('pddk_ibu', 10);
            $table->enum('penghasilan_ibu',["Kurang dari Rp.500,000", "Rp.500,000 - Rp.1,000,000",
            "Rp.1,000,000 - Rp.2,000,000", "Rp.2,000,000 - Rp.5,000,000", "Rp.5,000,000 - Rp.20,000,000","Lebih dari Rp.20,000,000","Tidak Penghasilan"]);
            $table->integer('sts_orang_tua')-> unsigned();
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
        Schema::dropIfExists('orang_tua');
    }
}

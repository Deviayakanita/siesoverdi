<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_siswa', function (Blueprint $table) {
            $table->bigIncrements('id_alumni');
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id_siswa')->on('peserta_didik');
            $table->string('nm_pt', 50);
            $table->enum('jns_pt', ["Negri", "Swasta"]);
            $table->string('nm_fak', 50);
            $table->string('nm_jurusan', 50);
            $table->enum('melanjutkan', ["Bekerja", "Kuliah"]);
            $table->integer('status_alumni')-> unsigned();
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
        Schema::dropIfExists('alumni_siswa');
    }
}

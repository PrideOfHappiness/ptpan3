<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_matakuliah')->unsigned();
            $table->bigInteger('user_id_dosen')->unsigned();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('namaFile')->nullable();
            $table->datetime('waktu_unggah');
            $table->timestamps();

            $table->foreign('user_id_dosen')->references('id')->on('users');
            $table->foreign('id_matakuliah')->references('id')->on('matakuliah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
};

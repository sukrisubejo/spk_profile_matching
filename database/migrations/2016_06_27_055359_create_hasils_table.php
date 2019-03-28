<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasils', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pendaftar_id')->unique();
            $table->integer('jurusan_id');
            $table->string('nilai_tpa');
            $table->string('nilai_wawancara');
            $table->string('nilai_uan');
            $table->string('nilai_minat');
            $table->string('nilai_rata');
            $table->string('penguji_id');
            $table->string('tahun_ajaran');
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
        Schema::drop('hasils');
    }
}

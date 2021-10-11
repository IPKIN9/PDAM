<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBangunanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangunan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bangunan');
            $table->string('no_sambungan');
            $table->bigInteger('luas_tanah');
            $table->string('jenis_bangunan');
            $table->string('status_bangunan');
            $table->string('perumahan_sambungan');
            $table->string('sumber_air');
            $table->string('pmj');
            $table->string('nama_sebelumnya')->nullable();
            $table->string('no_sebelumnya')->nullable();
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
        Schema::dropIfExists('bangunan');
    }
}

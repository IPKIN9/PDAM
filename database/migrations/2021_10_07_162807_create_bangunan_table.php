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
            $table->decimal('luas_tanah');
            $table->string('jenis_bangunan');
            $table->string('status_bangunan');
            $table->string('perumahan_sambungan');
            $table->string('sumber_air');
            $table->string('pmj');
            $table->string('nama_sebelumnya');
            $table->string('no_sebelumnya');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bangunan')->nullable()->constrained('bangunan');
            $table->string('status');
            $table->string('nama');
            $table->string('alamat');
            $table->string('rt_rw');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('no_pendaftaran');
            $table->string('alamat_sambungan');
            $table->string('jumlah penghuni');
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
        Schema::dropIfExists('pelanggan');
    }
}

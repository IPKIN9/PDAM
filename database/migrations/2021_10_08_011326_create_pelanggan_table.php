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
            $table->foreignId('id_golongan')->nullable()->constrained('golongan');
            $table->foreignId('id_detail_golongan')->nullable()->constrained('detail_golongan');
            $table->string('status');
            $table->string('nama');
            $table->text('alamat');
            $table->string('rt_rw');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('no_pendaftaran');
            $table->text('alamat_sambungan');
            $table->string('jumlah_penghuni');
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

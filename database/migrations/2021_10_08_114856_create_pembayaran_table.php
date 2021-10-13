<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->nullable()->constrained('users');
            $table->foreignId('id_pelanggan')->constrained('pelanggan');
            $table->foreignId('id_pemakaian')->constrained('pemakaian');
            $table->bigInteger('adm');
            $table->bigInteger('ppa');
            $table->bigInteger('denda');
            $table->bigInteger('total');
            $table->string('periode');
            $table->boolean('telah_dibayar');
            $table->date('tgl_pembayaran')->nullable();
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
        Schema::dropIfExists('pembayaran');
    }
}

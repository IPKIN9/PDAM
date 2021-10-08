<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailGolonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_golongan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_golongan')->constrained('golongan');
            $table->string('sub_golongan');
            $table->decimal('jumlah_rek_air');
            $table->decimal('meter');
            $table->decimal('jumlah_tagihan');
            $table->decimal('harga_air');
            $table->decimal('jasa_adm');
            $table->decimal('dana_meter');
            $table->decimal('harga_rata');
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
        Schema::dropIfExists('detail_golongan');
    }
}

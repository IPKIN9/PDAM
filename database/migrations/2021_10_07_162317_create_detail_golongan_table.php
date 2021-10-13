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
            $table->bigInteger('biaya_beban');
            $table->bigInteger('blok_1');
            $table->bigInteger('blok_2');
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

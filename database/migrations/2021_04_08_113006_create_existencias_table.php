<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('existencias', function (Blueprint $table) {
            $table->bigIncrements('id_existencias');
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->foreign('id_producto')->references('id_producto')->on('cat_productos');
            $table->unsignedBigInteger('id_almacen')->nullable();
            $table->foreign('id_almacen')->references('id_almacen')->on('cat_almacenes');
            $table->integer('existencias');
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
        Schema::dropIfExists('existencias');
    }
}

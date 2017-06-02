<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncargadosTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encargos2', function (Blueprint $table) {
            $table->increments('id');
            $table->char('albaran', 255)->nullable();
            $table->string('destinatario', 500)->nullable();
            $table->string('direccion', 500)->nullable();
            $table->char('poblacion', 255)->nullable();
            $table->char('cp', 255)->nullable();
            $table->string('provincia', 500)->nullable();
            $table->char('telefono', 255)->nullable();
            $table->longText('observaciones')->nullable();
            $table->date('fecha')->nullable();
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
        Schema::dropIfExists('encargos2');
    }
}

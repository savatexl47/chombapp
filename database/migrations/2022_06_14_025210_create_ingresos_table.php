<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_comprobante');
            $table->integer('serie');
            $table->integer('num_comprobante');
            $table->date('fecha');
            $table->integer('igv');
            $table->decimal('total');
            $table->string('nombre');
            $table->integer('cantidad');
            $table->string('unidad_compra');
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
        Schema::dropIfExists('ingresos');
    }
};

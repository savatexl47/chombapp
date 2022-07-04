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
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('marca');
            $table->string('presentacion');
            $table->date('vencimiento');
            $table->string('unidad_compra');
            $table->decimal('precio_compra');
            $table->integer('cantidad');
            $table->integer('stock_min');
            $table->integer('stock_max');
            $table->decimal('costo_min');
            $table->decimal('costo_max');
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
        Schema::dropIfExists('insumos');
    }
};

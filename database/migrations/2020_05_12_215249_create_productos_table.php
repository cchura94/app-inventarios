<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 200);
            $table->integer("cantidad");
            $table->decimal("precio", 10, 2);
            $table->string("imagen")->nullable();
            $table->text("descripcion")->nullable();
            $table->bigInteger("categoria_id")->unsigned();
            $table->bigInteger("proveedor_id")->unsigned();

            $table->foreign("categoria_id")->references("id")->on("categorias");
            $table->foreign("proveedor_id")->references("id")->on("proveedors");
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
        Schema::dropIfExists('productos');
    }
}

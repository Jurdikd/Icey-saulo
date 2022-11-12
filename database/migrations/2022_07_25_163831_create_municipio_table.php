<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void         
     */
    public function up()
    {   //crear tabla municipio
        Schema::create('municipios', function (Blueprint $table) {
            //atributos
            $table->id();
            $table->string('nombre', 100)->unique(); 
            //hacer referencia al id de la tabla estado
            $table->unsignedBigInteger('estado_id');

            //clave foranea
            $table->foreign('estado_id')
                //hacer referencia al id de la tabla estados
                    ->references('id')->on('estados');
                  
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
        Schema::dropIfExists('municipios');
    }
};

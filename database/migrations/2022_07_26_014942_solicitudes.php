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
           //crear tabla municipio
            Schema::create('solicitudes', function (Blueprint $table) {
                //atributos
                $table->id();
                $table->date('fecha');
                $table->boolean('estatus')->default(0);
                //hacer referencia al id de la tablas 
                $table->unsignedBigInteger('curso_id');
                $table->unsignedBigInteger('facilitador_id');
                $table->unsignedBigInteger('espacio_id');
                
                //clave foranea
                //$table->foreign('curso_id')->references('id')->on('cursos');   
                 $table->foreign('facilitador_id')
                        //hacer referencia al id de la tabla 
                        ->references('id')->on('facilitadors');             
                $table->foreign('espacio_id')
                        //hacer referencia al id de la tabla 
                        ->references('id')->on('espacios');                          
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
        Schema::dropIfExists('solicitudes');
    }
};

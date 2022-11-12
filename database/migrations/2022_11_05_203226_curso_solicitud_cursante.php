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
          Schema::create('curso_solicitud_cursante', function (Blueprint $table) {
            //atributos
            $table->id();
            //hacer referencia al id de la tabla 
            $table->unsignedBigInteger('solicitud_cursante_id');
            $table->unsignedBigInteger('aprobado_id');

            //clave foranea
            $table->foreign('aprobado_id')
                //hacer referencia al id de la tabla estados
                    ->references('id')->on('aprobados');
             $table->foreign('solicitud_cursante_id')
                //hacer referencia al id de la tabla estados
                    ->references('id')->on('solicitud_cursantes');        
                  
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
        Schema::dropIfExists('curso_solicitud_cursante');
    }
};

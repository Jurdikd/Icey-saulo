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
            Schema::create('solicitud_cursantes', function (Blueprint $table) {

                $table->id();
                
                $table->string('curso');
                //hacer referencia al id de la tablas 
                $table->unsignedBigInteger('cursante_id');
                //$table->integer('curso_id');
                //clave foranea
                $table->foreign('cursante_id')->references('id')->on('cursantes'); 
                        
                //$table->foreign('curso_id')->references('id')->on('cursos');                        
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

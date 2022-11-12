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
        Schema::create('aprobados', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('horas');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('cupos');
            $table->timestamps();  
            
            $table->unsignedBigInteger('solicitude_id');
                
            //clave foranea
            $table->foreign('solicitude_id')
                    //hacer referencia al id de la tabla 
                    ->references('id')->on('solicitudes'); 

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aprobados');
    }
};

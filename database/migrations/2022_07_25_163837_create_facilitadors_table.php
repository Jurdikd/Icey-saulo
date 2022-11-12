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
        Schema::create('facilitadors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->string('apellido', 45);
            $table->string('cedula', 9)->unique();
            $table->date('fecha_nacimiento');
            $table->string('telefono', 11);
            $table->string('correo', 100)->nullable();
            $table->unsignedBigInteger('parroquia_id');
            //clave foranea
            $table->foreign('parroquia_id')
                    ->references('id')->on('parroquias');
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
        Schema::dropIfExists('facilitadors');
    }
};

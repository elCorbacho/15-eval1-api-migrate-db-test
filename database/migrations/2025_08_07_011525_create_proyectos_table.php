<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    //permite crear la tabla proyectos
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_inicio');
            $table->string('estado');
            $table->string('responsable');
            $table->decimal('monto', 15, 2);
            $table->timestamps();
        });
    }

//permite eliminar la tabla proyectos
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};

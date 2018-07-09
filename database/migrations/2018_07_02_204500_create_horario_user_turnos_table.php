<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioUserTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_user_turnos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('horario_id');
            $table->integer('user_id');
            $table->integer('turno_id');
            $table->boolean('active')->default(1);
            $table->unique(['horario_id', 'user_id', 'turno_id' ]);
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
        Schema::dropIfExists('horario_user_turnos');
    }
}

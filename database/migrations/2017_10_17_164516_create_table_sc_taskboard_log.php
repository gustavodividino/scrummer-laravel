<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableScTaskboardLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sc_taskboard_log', function (Blueprint $table) {
            $table->increments('id_taskboard_log');
            $table->integer('id_user');
            $table->integer('id_productbacklog');
            $table->string('old_state');
            $table->string('state');
            $table->date('date');            
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
        Schema::dropIfExists('sc_taskboard_log');    

    }
}

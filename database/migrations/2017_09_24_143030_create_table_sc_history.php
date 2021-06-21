<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableScHistory extends Migration
{

    public function up()
    {
        Schema::create('sc_history', function (Blueprint $table) {
            $table->increments('id_history');
            $table->integer('id_user');
            $table->string('description');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sc_history');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableScAchivement extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sc_achivement', function (Blueprint $table) {
            $table->increments('id_achivement');
            $table->string('categoria');
            $table->integer('experience');
            $table->string('grade');
            $table->string('name');
            $table->string('description');
            $table->string('icon')->default('iconAchive.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sc_achivement');
    }

}

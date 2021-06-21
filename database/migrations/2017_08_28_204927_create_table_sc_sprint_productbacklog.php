<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableScSprintProductbacklog extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sc_sprint_productbacklog', function (Blueprint $table) {
            $table->increments('sc_sprint_productbacklog');
            $table->integer('id_sprint');
            $table->string('id_productbacklog');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sc_sprint_productbacklog');
    }

}

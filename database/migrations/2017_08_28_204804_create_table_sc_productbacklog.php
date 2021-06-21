<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableScProductbacklog extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sc_productbacklog', function (Blueprint $table) {
            $table->increments('id_productbacklog');
            $table->integer('id_project');
            $table->integer('id_status')->default(4);
            $table->string('name');
            $table->string('description');
            $table->integer('pokerplainpoint');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sc_productbacklog');
    }

}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableScAchivementProfile extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sc_achivement_profile', function (Blueprint $table) {
            $table->increments('id_achivement_profile');
            $table->integer('id_achivement');
            $table->integer('id_profile');
            $table->integer('highlight')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sc_achivement_profile');
    }

}

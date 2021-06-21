<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableScExperienceProfile extends Migration {
 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sc_experience_profile', function (Blueprint $table) {
            $table->increments('id_experience_profile');
            $table->integer('id_profile');
            $table->integer('points')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sc_experience_profile');
    }

}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableScProfile extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sc_profile', function (Blueprint $table) {
            $table->increments('id_profile');
            $table->integer('id_user');
            $table->string('phone');
            $table->string('cel');
            $table->string('address');
            $table->date('birthday');
            $table->string('photo')->default("");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sc_profile');
    }

}

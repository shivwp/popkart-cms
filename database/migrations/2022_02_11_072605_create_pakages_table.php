<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePakagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('share_list');
            $table->string('edit_list');
            $table->string('price_visiblity');
            $table->string('reward_access');
            $table->string('health_access');
            $table->string('google_ads');
            $table->string('discription');
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
        Schema::dropIfExists('pakages');
    }
}

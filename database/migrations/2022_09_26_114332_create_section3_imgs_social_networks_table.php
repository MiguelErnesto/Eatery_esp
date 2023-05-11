<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section3_imgs_social_networks', function (
            Blueprint $table
        ) {
            $table->id();
            $table->bigInteger('section3_imgs_id')->unsineg();
            $table
                ->foreign('section3_imgs_id')
                ->references('id')
                ->on('section3_imgs')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('image');
            $table->string('link');
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
        Schema::dropIfExists('section3_imgs_social_networks');
    }
};

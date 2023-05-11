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
        Schema::create('section1s', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('lb_button');
            $table->string('link_button');
            $table->string('small_text');
            $table->string('large_text');
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
        Schema::dropIfExists('section1s');
    }
};

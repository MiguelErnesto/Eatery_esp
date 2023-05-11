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
        Schema::create('section7s', function (Blueprint $table) {
            $table->id();
            // Find Us
            $table->string('fu_description');

            // Reservation
            $table->string('rv_number1');
            $table->string('rv_number2');
            $table->string('rv_email');
            $table->string('rv_text');

            // Open Hours
            $table->string('oh_closed');
            $table->string('oh_days1');
            $table->string('oh_hours1');
            $table->string('oh_days2');
            $table->string('oh_hours2');
            $table->string('oh_bg_image');
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
        Schema::dropIfExists('section7s');
    }
};

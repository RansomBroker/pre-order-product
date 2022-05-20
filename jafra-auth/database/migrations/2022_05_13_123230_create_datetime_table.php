<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datetime', function (Blueprint $table) {
            $table->id('datetime_id');
            $table->dateTime('date');
            $table->time('time');
            $table->unsignedBigInteger('time_id');
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
        Schema::dropIfExists('datetime');
        Schema::disableForeignKeyConstraints();
    }
};

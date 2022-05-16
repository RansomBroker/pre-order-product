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
        Schema::create('consultants', function (Blueprint $table) {
            $table->id('consultant_id')->autoIncrement();
            $table->string('consultant_unique_id');
            $table->string('consultant_name');
            $table->string('consultant_username')->nullable();
            $table->string('consultant_email')->unique();
            $table->string('password')->nullable();
            $table->string('ticket_type')->nullable();
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('update_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('consultants');
    }
};

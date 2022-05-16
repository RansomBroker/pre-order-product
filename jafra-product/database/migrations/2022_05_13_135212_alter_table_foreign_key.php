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
        Schema::table('carts', function (Blueprint $table) {
            $table
                ->foreign('product_id')
                ->references('product_id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table
                ->foreign('consultant_id')
                ->references('consultant_id')
                ->on('consultants')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table
                ->foreign('consultant_id')
                ->references('consultant_id')
                ->on('consultants')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table
                ->foreign('product_id')
                ->references('product_id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('products', function (Blueprint $table) {
            $table
                ->foreign('category_id')
                ->references('category_id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });


        Schema::table('categories', function (Blueprint $table) {
            $table
                ->foreign('brand_id')
                ->references('category_id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('seats', function (Blueprint $table) {
            $table
                ->foreign('consultant_id')
                ->references('consultant_id')
                ->on('consultants')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('datetime', function (Blueprint $table) {
            $table
                ->foreign('time_id')
                ->references('datetime_id')
                ->on('datetime')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table
                ->foreign('consultant_id')
                ->references('consultant_id')
                ->on('consultants')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table
                ->foreign('seat_id')
                ->references('seat_id')
                ->on('seats')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table
                ->foreign('venue_id')
                ->references('venue_id')
                ->on('venues')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table
                ->foreign('datetime_id')
                ->references('datetime_id')
                ->on('datetime')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::disableForeignKeyConstraints();
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('name', 50);
            $table->string('image', 100)->nullable();
            $table->string('address', 100);
            $table->char('vat_number', 11)->unique();
            $table->string('phone', 15)->unique();
            $table->string('opening_time')->default('11:30');
            $table->string('closure_time')->default('24:00');
            $table->float('min_order', 4, 2)->nullable();
            $table->float('delivery_cost', 4, 2)->nullable();
            $table->boolean('visible');
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
        Schema::dropIfExists('restaurants');
    }
}

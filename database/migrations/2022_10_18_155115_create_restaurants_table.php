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
            $table->string('name', 50)->unique();
            $table->string('image')->nullable();
            $table->string('address', 100)->unique();
            $table->char('vat_number', 11)->unique();
            $table->string('phone', 15)->unique();
            $table->time('opening_time')->required();
            $table->time('closure_time')->required();
            $table->float('min_order', 4, 2)->default(10.00);
            $table->float('delivery_cost', 4, 2)->default(2.00);
            $table->boolean('visible')->default(true);
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

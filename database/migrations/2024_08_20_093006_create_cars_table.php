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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('model_name', 50);
            $table->float('price', 10, 2);
            $table->boolean('used')->default(false);
            $table->unsignedBigInteger('km')->default(0);
            $table->tinyInteger('ports_number')->nullable();
            $table->unsignedBigInteger('cubic_capacity');
            $table->tinyInteger('transmission');
            $table->string('power_supply', 20);
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
        Schema::dropIfExists('cars');
    }
};

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
        Schema::table('cars', function (Blueprint $table) {
            // 1 - definisco prima la colonna
            $table->unsignedBigInteger('brand_id')->nullable()->after('id');

            // 2 - definisco la relazione con la tabella brand
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');

            $table->string('image_path', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            // 1 - cancello prima la relazione
            $table->dropForeign('cars_brand_id_foreign');
            // 2 - dopo cancello la colonna
            $table->dropColumn('brand_id');

            $table->dropColumn('image_path');
        });
    }
};

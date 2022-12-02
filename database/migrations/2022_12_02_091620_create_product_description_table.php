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
        Schema::create('product_description', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->string('point_1')->nullable();
            $table->string('point_2')->nullable();
            $table->string('point_3')->nullable();
            $table->string('point_4')->nullable();
            $table->string('point_5')->nullable();
            $table->string('point_6')->nullable();
            $table->string('point_7')->nullable();
            $table->string('point_8')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_description');
    }
};

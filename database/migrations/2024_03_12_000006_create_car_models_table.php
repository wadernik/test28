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
    public function up(): void
    {
        Schema::create('car_models', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('manufacturer_id');

            $table->foreign('manufacturer_id')
                ->references('id')
                ->on('car_manufacturers')
                ->onDelete('cascade');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
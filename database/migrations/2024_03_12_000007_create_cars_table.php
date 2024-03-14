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
        Schema::create('cars', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufacturer_id'); // Можно не использовать, т.к. model_id внутри имеет связь
            $table->unsignedBigInteger('model_id');
            $table->year('release_year')->nullable();
            $table->unsignedInteger('mileage')->nullable();
            $table->string('color', 64)->nullable(); // Можно через enum, можно через идентификатор и таблицу 'colors'

            $table->foreign('manufacturer_id')
                ->references('id')
                ->on('car_manufacturers')
                ->onDelete('cascade');

            $table->foreign('model_id')
                ->references('id')
                ->on('car_models')
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
        Schema::dropIfExists('cars');
    }
};
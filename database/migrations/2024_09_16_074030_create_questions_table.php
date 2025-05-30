<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('test_id')->nullable(); // Ensure the column type is correct
            $table->foreign('test_id')
                  ->references('id')->on('tests')
                  ->onDelete('cascade');

                  $table->string('head',500);
                  $table->string('headPhoto',300)->nullable();

                  $table->string('op1')->nullable();
                  $table->string('op1_photo',300)->nullable();
                  $table->string('op2',)->nullable();
                  $table->string('op2_photo',300)->nullable();
                  $table->string('op3')->nullable();
                  $table->string('op3_photo',300)->nullable();
                  $table->string('op4')->nullable();
                  $table->string('op4_photo',300)->nullable();

                  $table->string('correct');
                  $table->integer('points');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};

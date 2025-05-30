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
        Schema::create('students', function (Blueprint $table) {
          
            $table->timestamps();
            $table->unsignedBigInteger('test_id')->nullable(); 
            $table->foreign('test_id')
                  ->references('id')->on('tests')
                  ->onDelete('cascade');
                  $table->string('name');
                  $table->string('stu_id');
                  $table->string('email');

                  $table->primary(['test_id','stu_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

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
        Schema::create('modules', function (Blueprint $table) {
            $table->id('module_id');
            $table->string('module_title');
            $table->text('content');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('attendance_id');
            $table->timestamps();


            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');
            $table->foreign('attendance_id')->references('attendance_id')->on('attendances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};

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
        Schema::create('assignments', function (Blueprint $table) {
            $table->uuid('assignment_id')->primary();
            $table->string('file');
            $table->datetime('assignment_date');
            $table->datetime('deadline');
            $table->enum('status', ['dikumpulkan', 'terlambat', 'kosong']);
            $table->uuid('task_id');
            $table->uuid('user_id');
            $table->timestamps();


            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};

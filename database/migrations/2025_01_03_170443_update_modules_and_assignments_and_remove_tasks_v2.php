<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropForeign(['task_id']);
            $table->dropColumn('task_id');
        });

        Schema::dropIfExists('tasks');

        Schema::table('modules', function (Blueprint $table) {
            $table->dateTime('allow_submission_from')->nullable()->after('file_path');
            $table->dateTime('due_date')->nullable()->after('allow_submission_from');
        });

        Schema::table('assignments', function (Blueprint $table) {
            $table->dropForeign(['task_id']);
            $table->dropColumn('task_id');
            $table->string('file')->nullable()->change();
            $table->text('text')->nullable()->after('file');
            $table->unsignedBigInteger('module_id')->after('assignment_date');

            $table->foreign('module_id')->references('module_id')->on('modules')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('modules', function (Blueprint $table) {
            $table->dropColumn('allow_submission_from');
            $table->dropColumn('due_date');
        });

        Schema::table('assignments', function (Blueprint $table) {
            $table->dropForeign(['module_id']);
            $table->dropColumn('module_id');

            $table->string('file')->nullable(false)->change();
            $table->dropColumn('text');

            $table->unsignedBigInteger('task_id')->after('deadline');
            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->string('file');
            $table->text('description');
            $table->dateTime('deadline');
            $table->unsignedBigInteger('module_id');
            $table->timestamps();

            $table->foreign('module_id')->references('module_id')->on('modules')->onDelete('cascade');
        });
    }
};

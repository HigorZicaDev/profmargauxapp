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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students', 'id');
            $table->foreignId('teacher_id')->constrained('teachers', 'id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->date('date_schedule');
            $table->string('time_schedule', 5);
            $table->string('color_schedule', 10);
            $table->boolean('done')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};

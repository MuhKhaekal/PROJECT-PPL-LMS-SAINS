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
            $table->id();
            $table->string('assignment_name');
            $table->string('assignment_file_name')->nullable();
            $table->string('description');
            $table->foreignID('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignID('course_id')->constrained('course')->onDelete('cascade');
            $table->foreignID('meeting_id')->constrained('meeting')->onDelete('cascade');
            $table->timestamps();
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

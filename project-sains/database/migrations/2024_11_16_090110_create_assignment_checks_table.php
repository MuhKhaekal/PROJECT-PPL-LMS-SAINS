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
        Schema::create('assignment_checks', function (Blueprint $table) {
            $table->id();
            $table->string('assignment_check_file_name');
            $table->integer('score')->default(0);
            $table->foreignID('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignID('assignment_id')->constrained('assignments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_checks');
    }
};

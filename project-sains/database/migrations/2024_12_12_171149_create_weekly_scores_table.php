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
        Schema::create('weekly_scores', function (Blueprint $table) {
            $table->id();
            $table->integer('p1')->default(10);
            $table->integer('p2')->default(10);
            $table->integer('p3')->default(10);
            $table->integer('p4')->default(10);
            $table->integer('p5')->default(10);
            $table->integer('p6')->default(10);
            $table->foreignID('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignID('course_id')->nullable()->constrained('course')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_scores');
    }
};

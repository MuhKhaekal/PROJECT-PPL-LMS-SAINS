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
        Schema::create('pretests', function (Blueprint $table) {
            $table->id();
            $table->integer('kelancaran')->default(0);
            $table->integer('hukum_bacaan')->default(0);
            $table->integer('makharijul_huruf')->default(0);
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
        Schema::dropIfExists('pretests');
    }
};

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
        Schema::create('presence', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['hadir','izin','sakit','alfa']);
            $table->text('keterangan');
            $table->foreignID('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignID('course_id')->constrained('course')->onDelete('cascade');
            $table->foreignID('meeting_id')->constrained('meeting')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presence');
    }
};

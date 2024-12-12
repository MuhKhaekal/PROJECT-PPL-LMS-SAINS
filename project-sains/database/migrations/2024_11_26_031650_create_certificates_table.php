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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_name'); 
            $table->string('name')->nullable();
            $table->enum('type', ['Sertifikat Peserta Umum', 'Sertifikat Asisten Umum', 'Sertifikat Peserta Ikhwan Terbaik', 'Sertifikat Peserta Akhwat Terbaik', 'Sertifikat Asisten Ikhwan Terbaik', 'Sertifikat Asisten Akhwat Terbaik']);
            $table->foreignID('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};

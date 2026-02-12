<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('moods', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('emoji'); // Pastikan baris ini ada
        $table->text('note');
        $table->string('status')->default('active'); // Pastikan baris ini ada
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('moods');
    }
};
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
    Schema::create('moods', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Menghubungkan ke user yang sedang login
        $table->string('status'); // Senang, Sedih, Cemas, dll
        $table->text('note')->nullable(); // Catatan tambahan
        $table->timestamps();
    });
}
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
        Schema::create('depenses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->integer('montant');
            $table->foreignId('payer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('colocation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('categorie_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depenses');
    }
};

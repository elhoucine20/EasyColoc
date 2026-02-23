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
        //
            Schema::create('user_colocation', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['member','owner']);
            $table->date('joined_at');
            $table->date('left_at');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('colocation_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

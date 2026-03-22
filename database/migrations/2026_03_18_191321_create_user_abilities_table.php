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
        Schema::create('user_abilities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constraint('users')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Ability::class)->constraint('abilities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_abilities');
    }
};

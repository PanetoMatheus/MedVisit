<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Medico;
use App\Models\Produtos\Produto;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medico_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Medico::class)->constrained('medicos');
            $table->foreignIdFor(Produto::class)->constrained('produtos');
            $table->boolean('produto_foco')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medico_produtos');
    }
};

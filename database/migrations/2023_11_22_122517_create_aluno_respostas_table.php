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
        Schema::create('aluno_respostas', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('operacao_id');
            $table->string('tabuada_id');
            $table->string('aluno_id');
            $table->integer('resultado')->nullable();
            $table->boolean('acerto')->default(false);
            $table->string('tempo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aluno_respostas');
    }
};

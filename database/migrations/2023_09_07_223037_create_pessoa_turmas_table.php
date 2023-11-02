<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pessoa_turmas', function (Blueprint $table) {
            $table->uuid('id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pessoa_turmas');
    }
};

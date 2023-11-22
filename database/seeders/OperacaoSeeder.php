<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Operacao;

class OperacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Operacao::count()) {
            Operacao::create(['nome' => 'Soma', 'simbolo' => '+']);
            Operacao::create(['nome' => 'Multiplicação', 'simbolo' => '*']);
            Operacao::create(['nome' => 'Subtração', 'simbolo' => '-']);
            Operacao::create(['nome' => 'Divisão', 'simbolo' => '/']);
        }
    }
}

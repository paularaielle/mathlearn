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
            $data = [
                [
                    'nome' => 'Soma',
                    'simbolo' => '+',
                    'imagem' => 'img/simbolos/soma.png',
                ],
                [
                    'nome' => 'Multiplicação',
                    'simbolo' => '*',
                    'imagem' => 'img/simbolos/mult.png',
                ],
                [
                    'nome' => 'Subtração',
                    'simbolo' => '-',
                    'imagem' => 'img/simbolos/sub.png',
                ],
                [
                    'nome' => 'Divisão',
                    'simbolo' => '/',
                    'imagem' => 'img/simbolos/sub.png',
                ],
            ];

            foreach ($data as $d) {
                Operacao::create($d);
            }
        }
    }
}

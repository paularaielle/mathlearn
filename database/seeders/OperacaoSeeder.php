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
                    'icon' => '<i class="fa-solid fa-plus"></i>',
                ],
                [
                    'nome' => 'Multiplicação',
                    'simbolo' => '*',
                    'imagem' => 'img/simbolos/mult.png',
                    'icon' => '<i class="fa-solid fa-xmark"></i>',
                ],
                [
                    'nome' => 'Subtração',
                    'simbolo' => '-',
                    'imagem' => 'img/simbolos/sub.png',
                    'icon' => '<i class="fa-solid fa-minus"></i>',
                ],
                [
                    'nome' => 'Divisão',
                    'simbolo' => '/',
                    'imagem' => 'img/simbolos/div.png',
                    'icon' => '<i class="fa-solid fa-divide"></i>',
                ],
            ];

            foreach ($data as $d) {
                Operacao::create($d);
            }
        }
    }
}

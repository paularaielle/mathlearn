<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aluno;
use App\Models\PessoaTurma;
use App\Models\Turma;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Aluno::count()) {

            $turma = Turma::first();

            Aluno::factory()->count(2)->create([
                'perfil' => 1,
            ]);

            Aluno::factory()->create([
                'nome' => 'Ana Isabella',
                'nickname' => 'ana.isabella',
                'email' => 'anaisabella@gmail.com',
            ]);

            Aluno::factory()->create([
                'nome' => 'Ya. Nunes',
                'nickname' => 'ynunes',
                'email' => 'yasminnunes@gmail.com',
            ]);

            Aluno::factory()->create([
                'nome' => 'Arthur Gabriell',
                'nickname' => 'arthur.gabriell',
                'email' => 'arthurgabriell@gmail.com',
            ]);

            foreach(Aluno::all() as $a) {
                PessoaTurma::create([
                    'user_id' => $a->id,
                    'turma_id' => $turma->id,
                    'ativo' => true,
                ]);
            }

        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Turma;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criando administrador
        User::factory()->create([
            'nome' => 'Pedagogo',
            'email' => 'admin@admin.com',
            'nickname' => 'pedagogo',
            'perfil' => 3,
        ]);

        Turma::factory()->count(10)->create();

        $this->call([
            OperacaoSeeder::class,
            AlunoSeeder::class,
            ProfessorSeeder::class,
        ]);
    }
}

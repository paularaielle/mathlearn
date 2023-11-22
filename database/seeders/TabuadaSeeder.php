<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tabuada;

class TabuadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ns = [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10
        ];

        if (!Tabuada::count()) {
            foreach ($ns as $n) {
                Tabuada::create([ 'numero' => $n ]);
            }
        }
    }
}

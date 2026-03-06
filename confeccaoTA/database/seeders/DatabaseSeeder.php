<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        // \App\Models\cliente::factory(10)->create();

        // Cliente::factory()->create([
        //     'nome' => 'Teste2',
        //     'cpf' => '123456789-12'
        // ]);

        User::factory()->create([
            'name' => 'Confecção Teste',
            'email' => 'teste@confeccao.com',
        ]);
    }
}

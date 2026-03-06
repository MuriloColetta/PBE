<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;

class ClientesFactory extends Factory
{
    protected $model = Cliente::class;
    
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'cpf' => fake()->numerify('111.111.111-11'),
            'telefone' => fake()->numerify('(19) 99999-9999'),
            'reserva' => fake()->boolean(),
        ];
    }
}
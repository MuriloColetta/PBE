<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produto;

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

    public function definition(): array
    {
        return [
            'nome' => fake()->randomElement([
                'Camiseta Básica',
                'Calça Jeans',
                'Vestido Floral',
                'Blusa Social',
                'Shorts Praia',
                'Jaqueta Couro'
            ]),
            'descricao' => fake()->sentence(),
            'preco' => fake()->randomFloat(2, 10, 200),
            'categoria' => fake()->randomElement([
                'Vestuário',
                'Acessórios',
                'Calçados',
                'Roupas Íntimas'
            ]),
        ];
    }
}
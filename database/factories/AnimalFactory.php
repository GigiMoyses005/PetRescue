<?php
namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition(){
        return [
            'nome' => $this->faker->firstName(),
            'especie' => $this->faker->randomElement(['cachorro','gato']),
            'raca' => $this->faker->word(),
            'idade' => $this->faker->numberBetween(1,10).' anos',
            'porte' => $this->faker->randomElement(['pequeno','medio','grande']),
            'sexo' => $this->faker->randomElement(['M','F']),
            'descricao' => $this->faker->paragraph(),
            'status' => 'disponivel',
        ];
    }
}

<?php

namespace Database\Factories;
use App\Models\Katagori;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

class KatagoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_katagori' => $this->faker->name(), 
            'keterangan' => $this->faker->name(), 
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomNumber = rand(1,100);
        $foto = "https://picsum.photos/seed/{$randomNumber}/200/300";

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'nama_customer' => $this->faker->sentence(4),
            'foto' => $foto,
            'tgl_lahir' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'tmpt_lahir' => $this->faker->city(),
            'email' => $this->faker->unique()->safeEmail(),
            'no_telpon' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->sentence(50),
            'keterangan' => $this->faker->sentence(50),
        ];
    }
}

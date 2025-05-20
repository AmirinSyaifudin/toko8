<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;


class SupplierFactory extends Factory
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
            'nama' => $this->faker->sentence(4),
            'foto' => $foto,
            // date($format = 'Y-m-d', $max = 'now'),
            'tgl_lahir' => date($format = 'Y-m-d', $max = 'now'),
            'tmpt_lahir' => $this->faker->sentence(4),
            'email' => 'email',
            'kontak_suplier' => $this->faker->sentence(4),
            'no_telpon' => 'e164PhoneNumber',
            'alamat' => 'address', 
            'keterangan' => $this->faker->sentence(50),
        ];
    }
}

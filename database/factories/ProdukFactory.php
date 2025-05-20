<?php

namespace Database\Factories;

use App\Http\Controllers\Admin\SuppliyerController;
use App\Models\Katagori;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
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
            'katagori_id' => Katagori::inRandomOrder()->first()->id, 
            // 'supplier_id' => Supplier::inRandomOrder()->first()->id,
            'kode' => $this->faker->words(5, true),
            'nama' => $this->faker->sentence(4),
            'foto' => $foto,
            'harga_pembelian' => $this->faker->randomFloat(2, 1000, 10000000),
            'harga_penjualan' => $this->faker->randomFloat(2, 1000, 10000000),   
            'stok' => rand(10,2),
            'unit' => $this->faker->sentence(30),
            'keterangan' => $this->faker->sentence(50),
        ];
    }
}

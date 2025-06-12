<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('katagori_id')->constrained('katagori')->onUpdate('cascade')->onDelete('cascade');
             $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->string('fotosatu')->nullable();
            $table->string('fotodua')->nullable();
            $table->string('fototiga')->nullable();
            $table->integer('harga_pembelian');
            $table->integer('harga_penjualan');
            $table->integer('stok');
            $table->string('unit')->nullable();
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

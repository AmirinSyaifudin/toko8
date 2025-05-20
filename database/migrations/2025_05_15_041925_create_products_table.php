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
            $table->foreignId('supplier_id')->constrained('suppliers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->decimal('harga_pembelian',12 ,2);
            $table->decimal('harga_penjualan', 12, 2);
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

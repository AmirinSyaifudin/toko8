<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingprodukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookingproduk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->integer('harga_pembelian');
            $table->integer('harga_penjualan');
            $table->integer('stok');
            $table->date('tgl_booking')->nullable();
            $table->enum('status_suppliyer', ['Belum Verifikasi', 'Sudah Verifikasi']);
            $table->enum('status', ['Keranjang', 'Checkout']);
            $table->text('location');
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
        Schema::dropIfExists('bookingproduk');
    }
}

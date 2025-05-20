<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('user_id');
            $table->string('invoice')->unique();
            $table->dateTime('date');
            $table->decimal('total', 12 ,2);
            $table->decimal('discount', 12, 2)->default(0);
            $table->decimal('total_keseluruhan', 12 ,2);
            $table->enum('status', ['pending','proses','selesai','cancel'])->default('pending');
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('orders');
    }
}

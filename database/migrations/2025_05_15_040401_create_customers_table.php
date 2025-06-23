<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_customer');
            $table->string('foto')->nullable();
            $table->date('tgl_lahir');
            $table->string('tmpt_lahir');
            $table->string('email');
            $table->string('no_telpon');
            $table->text('alamat');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['Belum Verifikasi', 'Sudah Verifikasi']);
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
        Schema::dropIfExists('customers');
    }
}

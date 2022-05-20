<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_donasis', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nama_donatur');
            $table->string('email_donatur');
            $table->string('nomor_telepon_donatur');
            $table->string('nominal');
            $table->string('kode_verif')->nullable();
            $table->string('donasi_id');
            $table->string('doa')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(0);
            $table->string('anomin')->default(0);
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
        Schema::dropIfExists('transaksi_donasis');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acaras', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('slug');
            $table->string('gambar');
            $table->string('deskripsi');
            $table->string('deskripsi_singkat');
            $table->date('tanggal_kegiatan');
            $table->string('tempat');
            $table->date('batas_pendaftaran');
            $table->integer('jumlah_peserta');
            $table->integer('status')->default(0);
            $table->integer('status_event')->default(0);
            $table->string('harga')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acaras');
    }
}

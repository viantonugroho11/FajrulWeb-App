<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("nama_artikel");
            $table->string("slug");
            $table->text("isi_singkat");
            $table->longtext("isi_artikel");
            $table->string("gambar");
            $table->string("kategori_artikel_id");
            $table->date("tanggal_publish")->nullable();
            $table->string("publish")->nullable();
            // $table->string("editor");
            $table->string("penulis");
            $table->integer("status")->default(0);
            // $table->string("")
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
        Schema::dropIfExists('artikels');
    }
}

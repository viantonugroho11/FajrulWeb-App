<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('kategori_donasi_id');
            $table->text('short_description');
            $table->longText('description');
            $table->string('target_donasi');
            $table->date('target_tanggal_donasi');
            $table->string('status')->default(0);
            $table->string('admin_id');
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
        Schema::dropIfExists('donasis');
    }
}

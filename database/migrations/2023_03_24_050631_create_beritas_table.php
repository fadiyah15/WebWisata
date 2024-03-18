<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul',255)->unique();
            $table->text('berita');
            $table->dateTime('tgl_post');
            $table->unsignedBigInteger('id_kategori_berita');
            $table->foreign('id_kategori_berita')->references('id')->on('kategori_berita')->onDelete('cascade')->onUpdate('cascade');
            $table->text('foto');
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
        Schema::dropIfExists('berita');
    }
};

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
        Schema::create('alat', function (Blueprint $table) {
            $table->bigInteger('id_alat')->index()->primary();
            $table->integer('id_kategori')->index();
            $table->integer('id_jenis')->index();
            $table->string('nama_alat', 100)->index();
            $table->string('foto_alat')->index();
            $table->string('merk_alat', 100)->index();
            $table->integer('stok_alat')->index();
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alat');
    }
};

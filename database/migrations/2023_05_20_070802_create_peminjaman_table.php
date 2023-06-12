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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->bigInteger('id_peminjaman')->index()->primary();
            $table->integer('nim')->index();
            $table->bigInteger('id_alat')->index();
            $table->date('tanggal_peminjaman');
            $table->string('durasi_peminjaman')->index();
            $table->string('kegiatan', 100)->index();
            $table->string('status', 50)->index()->nullable();
            $table->foreign('nim')->references('nim')->on('peminjam');
            $table->foreign('id_alat')->references('id_alat')->on('alat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};

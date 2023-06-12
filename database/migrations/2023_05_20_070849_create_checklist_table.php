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
        Schema::create('checklist', function (Blueprint $table) {
            $table->bigInteger('id_checklist')->index()->primary();
            $table->bigInteger('id_peminjaman')->index();
            $table->date('tanggal_pengembalian');
            $table->string('kondisi', 50)->index();
            $table->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklist');
    }
};

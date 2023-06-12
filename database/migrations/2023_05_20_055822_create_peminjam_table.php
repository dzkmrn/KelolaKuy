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
        Schema::create('peminjam', function (Blueprint $table) {
            $table->integer('nim')->primary()->index();
            $table->string('nama_peminjam',50)->index();
            $table->string('jenis_kelamin', 10)->index();
            $table->string('prodi', 50)->index();
            $table->string('kelas', 50)->index();
            $table->string('no_handphone', 20)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjam');
    }
};

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
        Schema::create('perbaikan', function (Blueprint $table) {
            $table->id('idperbaikan');
            $table->dateTime('tanggal');
            $table->enum('statusPerbaikan', ['pencarian','proses','selesai']);
            $table->enum('statusPembayaran', ['belum bayar','sudah bayar']);
            $table->foreignId('idmekanik');
            $table->foreignId('idkerusakan');
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
        Schema::dropIfExists('perbaikans');
    }
};

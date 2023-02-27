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
        Schema::create('perbaikans', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->enum('statusPerbaikan', ['pencarian','proses','selesai'])->default('pencarian');
            $table->enum('statusPembayaran', ['belum bayar','sudah bayar'])->default('belum bayar');
            $table->foreignId('idmekanik')->nullable()->constrained('mekaniks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('idkerusakan')->nullable()->constrained('kerusakans')->cascadeOnDelete()->cascadeOnUpdate();
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

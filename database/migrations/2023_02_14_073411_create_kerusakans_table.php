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
        Schema::create('kerusakan', function (Blueprint $table) {
            $table->id('idkerusakan');
            $table->enum('jenisKendaraan', ['mobil','motor']);
            $table->string('tipeKendaraan', 45);
            $table->string('tahunKendaraan', 45);
            $table->string('fotoKendaraan', 45);
            $table->foreignId('idmember');
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
        Schema::dropIfExists('kerusakans');
    }
};

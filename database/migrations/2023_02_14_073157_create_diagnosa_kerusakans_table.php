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
        Schema::create('diagnosa_kerusakans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idjeniskerusakan')->constrained('jenis_kerusakans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('idkerusakan')->constrained('kerusakans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text("keterangan");
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
        Schema::dropIfExists('diagnosa_kerusakans');
    }
};

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
        Schema::create('detail_perbaikans', function (Blueprint $table) {
            $table->id();
            $table->string('jenisPerbaikan', 45);
            $table->integer('nominal');
            $table->text('keterangan');
            $table->foreignId('idperbaikan')->constrained('perbaikans')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('detail_perbaikans');
    }
};

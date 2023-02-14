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
        Schema::create('members', function (Blueprint $table) {
            $table->id("idmember");
            $table->string("nama", 45);
            $table->string("nohp", 12);
            $table->string("email", 45);
            $table->string("nik", 45);
            $table->string("ktp", 45);
            $table->text("foto");
            $table->text("alamat");
            $table->foreignId("iduser");
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
        Schema::dropIfExists('members');
    }
};

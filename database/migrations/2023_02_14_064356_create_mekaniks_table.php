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
        Schema::create('mekaniks', function (Blueprint $table) {
            $table->id();
            $table->string("name", 45);
            $table->text("alamat");
            $table->enum("statusAktivasi", ['1','0'])->default('0');
            $table->enum("statusSibuk", ['1','0'])->default('0');
            $table->foreignId("idmember")->nullable()->constrained('members')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('mekaniks');
    }
};

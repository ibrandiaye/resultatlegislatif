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
        Schema::create('representants', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("nin");
            $table->string(column: "profession");
            $table->string(column: "liste");
            $table->unsignedBigInteger("commune_id");
            $table->unsignedBigInteger("lieuvote_id");
            $table->foreign("commune_id")
            ->references("id")
            ->on("communes");
            $table->foreign("lieuvote_id")
            ->references("id")
            ->on("lieuvotes");
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
        Schema::dropIfExists('representants');
    }
};

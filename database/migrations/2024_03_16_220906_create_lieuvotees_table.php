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
        Schema::create('lieuvotees', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('nb');
            $table->unsignedBigInteger('centrevotee_id');
            $table->foreign('centrevotee_id')->references('id')->on('centrevotees')->onDelete('cascade');
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
        Schema::dropIfExists('lieuvotees');
    }
};

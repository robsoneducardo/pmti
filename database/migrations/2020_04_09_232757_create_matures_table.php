<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 30);
            $table->date('birth_at');
            $table->string('cpf', 15);
            $table->date('registered_at');
            $table->string('address', 45);
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->string('NIS', 20);
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
        Schema::dropIfExists('matures');
    }
}

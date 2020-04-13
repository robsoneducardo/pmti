<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSicknessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sicknesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mature_id');
            $table->foreign('mature_id')->references('id')->on('matures');
            $table->unsignedBigInteger('comorbidity_id');
            $table->foreign('comorbidity_id')->references('id')->on('comorbidities');
            $table->text('observation');
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
        Schema::dropIfExists('sicknesses');
    }
}

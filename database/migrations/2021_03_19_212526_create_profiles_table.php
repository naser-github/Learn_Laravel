<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dp');
            $table->string('bio',250);
            $table->string('address');
            $table->unsignedBigInteger('owner');
            $table->timestamps();

            $table->foreign('owner')->references('id')->on('inventors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Profiles');
    }
}

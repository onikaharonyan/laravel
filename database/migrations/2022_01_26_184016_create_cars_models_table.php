<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_models', function (Blueprint $table) {
            $table->id();
            $table->string ( 'title' );
            $table->text ( 'description' );
            $table->integer ( 'model' );
            $table->string ( 'year' );
            $table->string ( 'mileage' );
            $table->string ( 'engine' );
            $table->string ( 'towing' );
            $table->string ( 'wheel' );
            $table->string ( 'gearbox' );
            $table->string ( 'color' );
            $table->integer ( 'author' );
            $table->boolean ( 'published' )->default ( false );
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
        Schema::dropIfExists('cars_models');
    }
}

<?php

use Doctrine\DBAL\Schema\Column;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('combos')) {            
            Schema::create('combos', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description');
                $table->integer('adult_price');
                $table->integer('kid_price');
                $table->json('itinerary');
                $table->text('includes');
                $table->text('requirements');
                $table->string('image');
                $table->uuid('uuid');
                $table->string('language');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_ru');
            $table->string('title_fi');
            $table->string('title_et');
            $table->string('schedule');
            $table->text('description');
            $table->text('description_ru');
            $table->text('description_fi');
            $table->text('description_et');
            $table->decimal('discount',8,2,false);
            $table->float('price');
            $table->json('photos');
            $table->text('map')->nullable();
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
        Schema::dropIfExists('clubs');
    }
}

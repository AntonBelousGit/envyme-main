<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('title_ru', 255);
            $table->string('title_fi', 255);
            $table->string('title_et', 255);
            $table->string('description');
            $table->string('description_ru');
            $table->string('description_fi');
            $table->string('description_et');
            $table->text('content');
            $table->text('content_ru');
            $table->text('content_fi');
            $table->text('content_et');
            $table->string('image');
            $table->date('date');
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
        Schema::dropIfExists('newses');
    }
}

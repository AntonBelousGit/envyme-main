<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_ru')->nullable();
            $table->string('title_fi')->nullable();
            $table->string('title_et')->nullable();
            $table->enum('type', ['package', 'activity'])->default('package');
            $table->integer('amount_person');
            $table->float('price');
            $table->text('information');
            $table->text('information_ru')->nullable();
            $table->text('information_fi')->nullable();
            $table->text('information_et')->nullable();
            $table->text('additional_information');
            $table->text('additional_information_ru')->nullable();
            $table->text('additional_information_fi')->nullable();
            $table->text('additional_information_et')->nullable();
            $table->date('date');
            $table->string('image');
            $table->foreignId('club_id')->constrained();
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
        Schema::dropIfExists('events');
    }
}

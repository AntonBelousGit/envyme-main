<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipPrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_privileges', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_ru');
            $table->string('title_et');
            $table->string('title_fi');
            $table->boolean('bonus');
            $table->boolean('silver');
            $table->boolean('gold');
            $table->boolean('diamond');
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
        Schema::dropIfExists('membership_privileges');
    }
}

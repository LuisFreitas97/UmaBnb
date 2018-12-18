<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtrasHasAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_extra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('extra_id')->unsigned()->index();
            $table->integer('advertisement_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('extra_id')->references('id')->on('extras');
            $table->foreign('advertisement_id')->references('id')->on('advertisements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisement_extra');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsHasStuffingItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_stuffing_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stuffing_item_id')->unsigned()->index();
            $table->integer('advertisement_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('advertisement_id')->references('id')->on('advertisements');
            $table->foreign('stuffing_item_id')->references('id')->on('stuffing_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements_has_stuffing_item');
    }
}

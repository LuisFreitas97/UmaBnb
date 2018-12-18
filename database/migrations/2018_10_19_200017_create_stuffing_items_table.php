<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStuffingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuffing_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('stuffing_items')->insert(
            array
            (
                'name' => 'Móveis',
            )
        );     

        DB::table('stuffing_items')->insert(
            array
            (
                'name' => 'Frigorífico',
            )
        );             

        DB::table('stuffing_items')->insert(
            array
            (
                'name' => 'Micro-ondas',
            )
        );  

        DB::table('stuffing_items')->insert(
            array
            (
                'name' => 'Fogão',
            )
        );                     

        DB::table('stuffing_items')->insert(
            array
            (
                'name' => 'Forno',
            )
        );                     

        DB::table('stuffing_items')->insert(
            array
            (
                'name' => 'Máquina de café',
            )
        );              

        DB::table('stuffing_items')->insert(
            array
            (
                'name' => 'Máquina de lavar loiça',
            )
        );           

        DB::table('stuffing_items')->insert(
            array
            (
                'name' => 'Máquina de lavar roupa',
            )
        );              

        DB::table('stuffing_items')->insert(
            array
            (
                'name' => 'Máquina de secar roupa',
            )
        );       

        DB::table('stuffing_items')->insert(
            array
            (
                'name' => 'Ar condicionado',
            )
        );          

        DB::table('stuffing_items')->insert(
            array
            (
                'name' => 'Esquentador',
            )
        );               

        DB::table('stuffing_items')->insert(
            array
            (
                'name' => 'Aquecedor',
            )
        );                                                         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stuffing_items');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('advertisement_types')->insert(
            array
            (
                'description' => 'Aluguer de quarto individual'
            )
        );  

        DB::table('advertisement_types')->insert(
            array
            (
                'description' => 'Aluguer de quarto duplo'
            )
        );   

        DB::table('advertisement_types')->insert(
            array
            (
                'description' => 'Aluguer de casa'
            )
        );                      

        DB::table('advertisement_types')->insert(
            array
            (
                'description' => 'Aluguer de apartamento'
            )
        );          

        DB::table('advertisement_types')->insert(
            array
            (
                'description' => 'Aluguer de sótão'
            )
        );          

        DB::table('advertisement_types')->insert(
            array
            (
                'description' => 'Aluguer de garagem'
            )
        );          

        DB::table('advertisement_types')->insert(
            array
            (
                'description' => 'Venda de imóvel'
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
        Schema::dropIfExists('advertisement_types');
    }
}

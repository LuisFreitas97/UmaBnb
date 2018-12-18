<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('extras')->insert(
            array
            (
                'name' => 'Água',
            )
        );     

        DB::table('extras')->insert(
            array
            (
                'name' => 'Gás',
            )
        );             

        DB::table('extras')->insert(
            array
            (
                'name' => 'TV cabo',
            )
        );  

        DB::table('extras')->insert(
            array
            (
                'name' => 'Roupa lavada',
            )
        );                     

        DB::table('extras')->insert(
            array
            (
                'name' => 'Roupa engomada',
            )
        );                     

        DB::table('extras')->insert(
            array
            (
                'name' => 'Limpeza do imóvel',
            )
        );              

        DB::table('extras')->insert(
            array
            (
                'name' => 'Luz',
            )
        );           

        DB::table('extras')->insert(
            array
            (
                'name' => 'Internet',
            )
        );              

        DB::table('extras')->insert(
            array
            (
                'name' => 'Condomínio',
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
        Schema::dropIfExists('extras');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typologies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('typologies')->insert(
            array
            (
                'description' => 'T0',
            )
        );                   

        DB::table('typologies')->insert(
            array
            (
                'description' => 'T1',
            )
        );        
        DB::table('typologies')->insert(
            array
            (
                'description' => 'T2',
            )
        );       
        DB::table('typologies')->insert(
            array
            (
                'description' => 'T3',
            )
        );               
        DB::table('typologies')->insert(
            array
            (
                'description' => 'T4',
            )
        );       
        DB::table('typologies')->insert(
            array
            (
                'description' => 'T5 ou superior',
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
        Schema::dropIfExists('typologies');
    }
}

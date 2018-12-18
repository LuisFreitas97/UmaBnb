<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenderRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gender_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('gender_rules')->insert(
            array
            (
                'description' => 'Rapaz',
            )
        );    
       DB::table('gender_rules')->insert(
            array
            (
                'description' => 'Rapariga',
            )
        ); 
        DB::table('gender_rules')->insert(
            array
            (
                'description' => 'Misto',
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
        Schema::dropIfExists('gender_rules');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('address');            
            $table->float('areaU');
            $table->float('areaB');            
            $table->float('price');
            $table->float('latitude');
            $table->float('longitude');
            $table->integer('qtdWC');
            $table->date('anoConstrucao');
            $table->integer('nrVisualizacoes')->default(0);
            $table->boolean('isPrivate')->default(0);            
            $table->boolean('needsSecurityDeposit')->default(0);
            $table->boolean('landlordResides')->default(0);
            $table->boolean('providesInvoice')->default(0);
            $table->integer('type')->unsigned()->index();            
            $table->integer('typology')->unsigned()->index();                 
            $table->integer('user_id')->unsigned()->index();                
            $table->integer('genderRuleId')->unsigned()->index();
            $table->foreign('type')->references('id')->on('advertisement_types');
            $table->foreign('typology')->references('id')->on('typologies');            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('genderRuleId')->references('id')->on('gender_rules');    
            $table->timestamps();            
        });

        DB::table('advertisements')->insert(
            array
            (
                'title' => 'Casa exemplo',
                'description' => 'Boa casa para exemplificar',
                'type' => '1',
                'typology' => '1',
                'areaB' => '55',
                'areaU' => '56',
                'anoConstrucao' => '2017-12-12',
                'qtdWC' => '2',
                'price' => '200',
                'user_id' => '1',
                'address' => 'Rua das Avenidas, nº 20',
                'isPrivate' => '1',
                'latitude' => '32.6',
                'longitude' => '-16.9',
                'needsSecurityDeposit' => '1',
                'landlordResides' => '1',
                'providesInvoice' => '1',
                'genderRuleId' => '1'
            )
        );    

        DB::table('advertisements')->insert(
            array
            (
                'title' => 'Casa exemplo 2',
                'description' => 'Boa casa para exemplificar 2',
                'type' => '1',
                'typology' => '1',
                'areaB' => '25',
                'areaU' => '26',
                'anoConstrucao' => '2010-12-12',
                'qtdWC' => '7',
                'price' => '200',
                'latitude' => '32.5',
                'longitude' => '-16.5',
                'user_id' => '1',
                'address' => 'Rua das Avenidas, nº 21',
                'isPrivate' => '0',
                'needsSecurityDeposit' => '1',
                'landlordResides' => '1',
                'providesInvoice' => '1',
                'genderRuleId' => '1'
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
        Schema::dropIfExists('advertisements_has_stuffing_item');
        Schema::dropIfExists('advertisement_extra');
        Schema::dropIfExists('advertisements');
    }
}

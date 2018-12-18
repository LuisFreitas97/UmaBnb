<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone')->nullable();            
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('userType')->unsigned()->index()->default(2);                 
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('userType')->references('id')->on('user_types');
        });        

        DB::table('users')->insert(
            array
            (
                'name' => 'admin',
                'email' => 'admin@admin.admin',
                'password' => Hash::make('admin'),
                'phone' => '999 999 999',
                'userType' => 1
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('email')->unique()->index();
            $table->string('password', 60);
            $table->date('birthday');
            $table->string('phone',20);
            $table->string('country');
            $table->string('zip_code',10);
            $table->string('address',255);
            $table->string('district', 150);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('number', 10);
//            $table->integer('state_id')->unsigned();
            $table->string('complement');
            $table->boolean('term_read');
            $table->boolean('newsletter');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
//            $table->foreign('state_id')->references('id')->on('states');
            $table->enum('gender', array('m', 'f', 'o'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
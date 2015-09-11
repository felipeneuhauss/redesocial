<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fantasy_name');
            $table->string('social_name');
            $table->string('cnpj',20);
            $table->string('representative_name',150);
            $table->string('representative_cpf',15);
            $table->string('representative_phone',15);
            $table->string('zip_code',10);
            $table->string('address',255);
            $table->string('city', 100);
            $table->integer('state_id')->unsigned();
            $table->string('complement');
            $table->boolean('term_read');
            $table->string('link')->unique()->index();
            $table->string('phone_one');
            $table->string('phone_two')->nullable();
            $table->string('site');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('youtube');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('suppliers');
    }
}
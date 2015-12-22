<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('init_at');
            $table->dateTime('end_at');
            $table->string('init_hour');
            $table->string('end_hour');
            $table->string('password');
            $table->string('max_attendees');
            $table->string('quantity_person_waiting');
            $table->text('description');
            $table->string('country', 150);
            $table->string('zip_code',10);
            $table->string('address',255);
            $table->string('district', 150);
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('number', 10);
            $table->string('complement');
            $table->string('image', 255);
            $table->string('link', 255);
            $table->string('phone', 15);
            $table->string('email', 200);
            $table->string('site', 255);
            $table->string('facebook', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}

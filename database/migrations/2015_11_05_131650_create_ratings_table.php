<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grade');
            $table->string('title', 255);
            $table->text('description');
            $table->dateTime('happened_at')->nullable();
            $table->enum('you_were', array('contratante', 'convidado'))->nullable();
            $table->integer('service_quality_grade')->nullable();
            $table->integer('cost_benefit_grade')->nullable();
            $table->integer('contract_compliance_grade')->nullable();
            $table->integer('treatment_grade')->nullable();
            $table->text('tips')->nullable();
            $table->integer('indicate')->nullable();
            $table->integer('return_contact')->nullable();
            $table->string('phone', 15)->nullable();
            $table->integer('term_read');
            $table->integer('user_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
//            $table->integer('product_id')->unsigned();
            $table->dateTime('deleted_at')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('sub_category_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('ratings', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
//            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('sub_category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ratings');
    }
}

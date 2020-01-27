<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_name');
            $table->string('commercial_reg');
            $table->string('representative');
            $table->text('notes');
            $table->string('contact_fname');
            $table->string('contact_lname');
            $table->string('contact_email');
            $table->string('contact_social');
            $table->string('website');
            $table->integer('city');
            $table->string('phone');
            $table->integer('user_id');
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
        Schema::dropIfExists('institute_details');
    }
}

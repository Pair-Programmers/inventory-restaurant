<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string("name");
            $table->string("phone")->nullable();
            $table->string("address")->nullable();
            $table->string("email")->nullable();
            $table->string("profile_image")->default('profile_image_icon.png');
            $table->string("type")->nullable();
            $table->integer("balance")->default(0);
            $table->integer("opening_balance")->default(0);

            $table->bigInteger('created_by')->unsigned()->comment('This is admin, and value is comming from admins table');
            $table->foreign('created_by')->references('id')->on('admins');
            
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
        Schema::dropIfExists('customers');
    }
}

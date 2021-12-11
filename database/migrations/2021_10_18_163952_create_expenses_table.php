<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->date("date");
            $table->integer("amount");
            $table->longText("note")->nullable();
            $table->string("images")->default("[]");

            $table->bigInteger('expense_category_id')->unsigned();
            $table->foreign('expense_category_id')->references('id')->on('expense_categories');
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
        Schema::dropIfExists('expenses');
    }
}

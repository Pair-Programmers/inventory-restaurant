<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->unsigned();

            $table->string('name');
            $table->integer('price');
            $table->integer('opening_qty');
            $table->integer('available_qty');
            $table->string('type')->nullable();
            $table->string('unit')->nullable();
            $table->string('images')->nullable();
            $table->string('colors')->nullable();
            $table->string('description')->nullable();
            $table->string('brand')->nullable();

            $table->bigInteger('product_category_id')->unsigned();
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->bigInteger('product_subcategory_id')->unsigned();
            $table->foreign('product_subcategory_id')->references('id')->on('product_sub_categories');
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
        Schema::dropIfExists('products');
    }
}
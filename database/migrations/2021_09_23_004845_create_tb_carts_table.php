<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_product');
            $table->integer('id_order');
            $table->integer('id_customer');
            $table->integer('id_product_detail');
            $table->integer('price');
            $table->integer('qty');
            $table->integer('total');
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
        Schema::dropIfExists('tb_carts');
    }
}

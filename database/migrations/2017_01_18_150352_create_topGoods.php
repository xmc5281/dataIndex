<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gid');
            $table->integer('cateid');
            $table->integer('brandid');
            $table->double('sales');
            $table->integer('sales_num');
            $table->integer('orders');
            $table->integer('buyer_num');
            $table->integer('top');
            $table->date('sale_time');
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
        Schema::dropIfExists('top_goods');
    }
}

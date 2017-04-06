<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataCategoryDay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataCategoryDay', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_key');
            $table->integer('cateid');
            $table->double('sales');
            $table->integer('sales_num');
            $table->integer('send_num');
            $table->integer('orders_num');
            $table->integer('buyer_num');
            $table->double('avg_order_price');
            $table->double('avg_buyer_price');
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
        Schema::dropIfExists('dataCategoryDay');
    }
}

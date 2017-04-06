<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petColumn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_public')->default(0);
            $table->string('thumbnail')->nullable();
            $table->integer('user_id');
            $table->string('describe')->nullable()->comment('栏目描述');
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
        Schema::dropIfExists('petColumn');
    }
}

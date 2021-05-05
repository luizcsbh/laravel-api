<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdereditemTable extends Migration
{

    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('ordereditem', function (Blueprint $table) {
            $table->increments('cod_item');
            $table->integer('orders_id')->unsigned()->index();
            $table->integer('products_id')->unsigned()->index();
            $table->integer('amount');
            
            $table->timestamps();

            $table->foreign('orders_id')
                ->references('orders_id')
                ->on('orders');
            $table->foreign('products_id')
                ->references('products_id')
                ->on('products');
            
            $table->engine = 'InnoDB';

        });
    }


    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('ordereditem');
        Schema::enableForeignKeyConstraints();
    }
}

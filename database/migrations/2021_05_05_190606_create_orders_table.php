<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('orders_id');
            $table->integer('customers_id')->unsigned()->index();
            $table->date('order_date');
            $table->boolean('finished');

            $table->timestamps();

            $table->foreign('customers_id')
                ->references('customers_id')
                ->on('customers');
            
            $table->engine = 'InnoDB';
            
        });
        
        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('orders');
        Schema::enableForeignKeyConstraints();
    }
}
